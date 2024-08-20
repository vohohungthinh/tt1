<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thongtin-nha-import">

    <h1>Import Excel</h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'excelFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Upload housing information ', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

