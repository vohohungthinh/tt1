<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\ThongtinNha;
use app\models\UploadForm;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use yii\filters\AccessControl;
use yii\db\Exception;

class ThongtinNhaController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['import'],
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

    public function actionImport()
{
    $model = new UploadForm();
    $errors = [];

    if (Yii::$app->request->isPost) {
        $model->excelFile = UploadedFile::getInstance($model, 'excelFile');

        // Validate file upload
        if ($model->validate()) {
            $reader = new Xlsx();
            $spreadsheet = $reader->load($model->excelFile->tempName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            $transaction = Yii::$app->db->beginTransaction();

            try {
                foreach ($sheetData as $key => $row) {
                    if ($key === 1) continue; // Bỏ qua hàng tiêu đề

                    $thongtinNha = new ThongtinNha();
                    $thongtinNha->id = $row['A'];
                    $thongtinNha->sonha = $row['B'];
                    $thongtinNha->tenduong = $row['C'];
                    $thongtinNha->phuongxa = $row['D'];
                    $thongtinNha->quanhuyen = $row['E'];
                    $thongtinNha->dientich_dat = $row['F'];
                    $thongtinNha->dientich_xaydung = $row['G'];
                    $thongtinNha->dientich_san = $row['H'];
                    $thongtinNha->soto = $row['I'];
                    $thongtinNha->sothua = $row['J'];
                    $thongtinNha->chusohuu = $row['K'];

                    foreach ($row as $column => $value) {
                        if (empty($value) && $column !== 'K') { 
                            $errors[] = [
                                'row' => $key,
                                'column' => $column,
                                'message' => 'Ô này không được để trống.',
                            ];
                        }
                    }
                    if (!$thongtinNha->validate()) {
                        foreach ($thongtinNha->errors as $attribute => $messages) {
                            foreach ($messages as $message) {
                                $errors[] = [
                                    'row' => $key,
                                    'column' => $attribute,
                                    'message' => $message,
                                ];
                            }
                        }
                    } else {
                        $exists = ThongtinNha::findOne(['id' => $thongtinNha->id]);
                        if ($exists === null) {
                            $thongtinNha->save();
                        }
                    }
                }

                if (empty($errors)) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Import thành công! Chỉ thêm các dòng mới.');
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', 'Import có lỗi xảy ra. Vui lòng kiểm tra lỗi.');
                }
            } catch (Exception $e) {}

            return $this->render('import', [
                'model' => $model,
                'errors' => $errors,
            ]);
        } else {
            $errors = $model->errors;
        }
    }

    return $this->render('import', ['model' => $model, 'errors' => $errors]);
}

}

