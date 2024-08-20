<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $errors array */

?>

<div class="thongtin-nha-import">

    <h1>Import Excel</h1>

    <!-- Biểu mẫu upload file Excel -->
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'excelFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Upload housing information', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <!-- Hiển thị bảng lỗi nếu có -->
    <?php if (!empty($errors)): ?>
        <h3>Các lỗi trong quá trình import:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Dòng</th>
                    <th>Thuộc tính</th>
                    <th>Lỗi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($errors as $error): ?>
                    <tr>
                        <td><?= Html::encode($error['row']) ?></td>
                        <td><?= Html::encode($error['column']) ?></td>
                        <td><?= Html::encode($error['message']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Nút thử lại để người dùng dễ dàng tải lại trang -->
        <div class="form-group">
            <?= Html::a('Thử lại', ['import'], ['class' => 'btn btn-warning']) ?>
        </div>
    <?php endif; ?>

</div>
