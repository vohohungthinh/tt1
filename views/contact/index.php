<?php

use app\models\Contact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ContactSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Contacts';
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'STT'],
            //'id',
            'name',
            'email:email',
            'phone',
            'body:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Contact $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'template' => '{view} {delete} {feedback}', // Thêm nút phản hồi
                 'buttons' => [
                     'feedback' => function ($url, $model, $key) {
                         return Html::a('Phản hồi', ['feedback', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
                     },
                 ],
            ],
        ],
    ]); ?>


</div>
