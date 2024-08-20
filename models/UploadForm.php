<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $excelFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['excelFile'], 'file', 'extensions' => 'xlsx', 'mimeTypes' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
        ];
    }
}
