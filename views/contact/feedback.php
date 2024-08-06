<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = 'Phản hồi Contact: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-feedback">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="contact-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

        <div class="form-group">
            <?= Html::label('Message', 'message') ?>
            <?= Html::textarea('message', '', ['class' => 'form-control']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Send Feedback', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
