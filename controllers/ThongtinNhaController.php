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

class ThongtinNhaController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['import'], // Kiểm soát truy cập cho action import
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Chỉ cho phép người dùng đã đăng nhập
                        'matchCallback' => function ($rule, $action) {
                            // Kiểm tra xem người dùng có vai trò admin hay không
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

        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');

            if ($model->validate()) {
                $reader = new Xlsx();
                $spreadsheet = $reader->load($model->excelFile->tempName);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                foreach ($sheetData as $row) {
                    if ($row['A'] !== 'id') { // Bỏ qua hàng tiêu đề
                        // Kiểm tra xem dữ liệu đã tồn tại trong cơ sở dữ liệu hay chưa
                        $exists = ThongtinNha::findOne(['id' => $row['A']]);
                        if ($exists === null) {
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
                            $thongtinNha->save();
                        }
                    }
                }

                Yii::$app->session->setFlash('success', 'Import thành công! Chỉ thêm các dòng mới.');
                return $this->redirect(['import']);
            }
        }

        return $this->render('import', ['model' => $model]);
    }
}
