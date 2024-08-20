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
            [['excelFile'], 'required', 'message' => 'Vui lòng chọn file Excel để tải lên.'],
            [['excelFile'], 'file', 'extensions' => 'xlsx', 'message' => 'Chỉ chấp nhận file có định dạng .xlsx.'],
        ];
    }
}
