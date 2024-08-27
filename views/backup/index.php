<?php
/** @var yii\web\View $this */
/** @var array $backupFiles */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Database Backup';
?>

<div class="backup-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="backup-actions">
        <?= Html::a('Create Backup', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <h3>Backup Files:</h3>
    <div class="backup-list">
        <ul class="list-group">
            <?php foreach ($backupFiles as $file): ?>
                <?php
                // Lấy thời gian tạo file từ hệ thống tập tin
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $filePath = Yii::getAlias('@backups') . '/' . $file;
                $fileTime = date('H:i:s - d/m/Y', filemtime($filePath));
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= Html::a($file, Url::to(['download', 'file' => $file])) ?></span>
                    <span>
                        <span class="file-time"><?= Html::encode($fileTime) ?></span>
                        <?= Html::a('Download', ['download', 'file' => $file], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= Html::a('Delete', ['delete', 'file' => $file], [
                            'class' => 'btn btn-danger btn-sm',
                            'data-confirm' => 'Are you sure you want to delete this file?',
                            'data-method' => 'post',
                        ]) ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<style>
    .backup-index {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .backup-actions {
        margin-bottom: 20px;
        text-align: right;
    }

    .backup-list {
        margin-top: 20px;
    }

    .list-group-item {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .list-group-item span {
        display: inline-block;
        min-width: 100px;
    }

    .alert {
        margin-bottom: 20px;
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
    }

    h3 {
        font-size: 20px;
        font-weight: bold;
        margin-top: 30px;
    }

    .btn {
        margin-right: 5px;
    }
</style>
