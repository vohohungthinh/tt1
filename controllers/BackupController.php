<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class BackupController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === 'admin';
                        },
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->setReturnUrl(Yii::$app->request->url);
            return $this->redirect(['site/login'])->send();
        }

        return parent::beforeAction($action);
    }
    
    // Action tạo backup
        public function actionCreate()
    {
        
        $backupPath = Yii::getAlias('@backups');
        FileHelper::createDirectory($backupPath); // Tạo thư mục nếu chưa có
        
        $db = Yii::$app->db;
        $tables = $this->getTables($db); // Lấy danh sách bảng
        
        // Lấy danh sách các file đã có trong thư mục backup
        $existingBackupFiles = $this->getExistingBackupFiles($backupPath);

        foreach ($tables as $table) {
            // Tạo tên file backup cho từng bảng
            $backupFile = $backupPath . '/backup-'  . $table . '.sql';
            $file = fopen($backupFile, 'w');
            // Kiểm tra nếu file backup cho bảng này đã tồn tại
            if (!in_array($table . '.sql', $existingBackupFiles)) {
                // Tạo lệnh mysqldump để backup cả cấu trúc và dữ liệu của bảng
                $createTable = $db->createCommand("SHOW CREATE TABLE `$table`")->queryOne();
                if ($createTable && isset($createTable['Create Table'])) {
                    fwrite($file, $createTable['Create Table'] . ";\n\n");
                }
                // Lấy lệnh INSERT INTO
                $rows = $db->createCommand("SELECT * FROM `$table`")->queryAll();
                foreach ($rows as $row) {
                    $columns = implode('`, `', array_keys($row));
                    $values = implode(', ', array_map([$db, 'quoteValue'], array_values($row)));
                    
                    $sql = "INSERT INTO `$table` (`$columns`) VALUES ($values);\n";
                    fwrite($file, $sql);
                }
                if (file_exists($backupFile)) {
                    Yii::$app->session->setFlash('success', 'Backup for table ' . $table . ' created successfully.');
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to create backup for table ' . $table . '.');
                }
            } else {
                Yii::$app->session->setFlash('info', 'Backup for table ' . $table . ' already exists.');
            }
        }

        return $this->redirect(['index']);
    }
    

    // Action hiển thị danh sách file backup
    public function actionIndex()
{
    $backupPath = Yii::getAlias('@backups');
    $backupFiles = FileHelper::findFiles($backupPath);
    $backupFiles = array_map('basename', $backupFiles);

    // Lấy thời gian backup từ session
    $backupTime = Yii::$app->session->get('backupTime', 'Chưa có backup');

    return $this->render('index', [
        'backupFiles' => $backupFiles,
        'backupTime' => $backupTime,
    ]);
}

    // Action để tải file backup về máy
    public function actionDownload($file)
    {
        $backupPath = Yii::getAlias('@backups') . '/' . $file;
        if (file_exists($backupPath)) {
            return Yii::$app->response->sendFile($backupPath);
        }
        throw new NotFoundHttpException('The requested file does not exist.');
    }

    // Action để xóa file backup
    public function actionDelete($file)
    {
        $backupPath = Yii::getAlias('@backups') . '/' . $file;
        if (file_exists($backupPath)) {
            unlink($backupPath);
            Yii::$app->session->setFlash('success', 'Backup deleted successfully.');
        } else {
            Yii::$app->session->setFlash('error', 'Failed to delete backup.');
        }
        return $this->redirect(['index']);
    }

    // Phương thức lấy danh sách tất cả các bảng
    protected function getTables($db)
    {
        $tables = $db->createCommand('SHOW TABLES')->queryColumn();
        return $tables;
    }

    // Phương thức lấy danh sách các file backup hiện có
    protected function getExistingBackupFiles($backupPath)
    {
        $backupFiles = FileHelper::findFiles($backupPath);
        return array_map('basename', $backupFiles);
    }
}
