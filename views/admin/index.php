<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Admin Dashboard';

$this->registerCss("
    .data-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 20px;
    }
    .admin-card {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }
    .admin-card:hover {
        transform: scale(1.05);
    }
    .admin-card-title {
        font-size: 1.5em;
        margin-bottom: 10px;
    }
    .admin-card-description {
        font-size: 1.2em;
        color: #666;
    }
");

?>
<div class="admin-dashboard">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Welcome to the admin dashboard. Choose a section to manage:
    </p>
    <div class="data-container">
        <div class="admin-card">
            <div class="admin-card-title"><?= Html::a('Manage Contacts', ['contact/index'], ['class' => 'btn btn-success']) ?></div>
            <div class="admin-card-description">Manage the contact information of all users.</div>
        </div>
        <div class="admin-card">
            <div class="admin-card-title"><?= Html::a('Manage Countries', ['country/index'], ['class' => 'btn btn-success']) ?></div>
            <div class="admin-card-description">Manage country data and related information.</div>
        </div>
        <div class="admin-card">
            <div class="admin-card-title"><?= Html::a('Upload ', ['thongtin-nha/import'], ['class' => 'btn btn-success']) ?></div>
            <div class="admin-card-description">Manage upload housing information.</div>
        </div>
        <div class="admin-card">
            <div class="admin-card-title"><?= Html::a('Backup Database', ['backup/index'], ['class' => 'btn btn-success']) ?></div>
            <div class="admin-card-description">Backup your database and download the backup files.</div>
    </div>
</div>
