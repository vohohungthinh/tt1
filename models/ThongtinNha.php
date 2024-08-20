<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "thongtin_nha".
 *
 * @property int $id
 * @property string $sonha
 * @property string $tenduong
 * @property string $phuongxa
 * @property string $quanhuyen
 * @property float $dientich_dat
 * @property float $dientich_xaydung
 * @property float $dientich_san
 * @property string $soto
 * @property string $sothua
 * @property string $chusohuu
 */
class ThongtinNha extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thongtin_nha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sonha', 'tenduong', 'phuongxa', 'quanhuyen', 'soto', 'sothua', 'chusohuu'], 'required'],
            [['dientich_dat', 'dientich_xaydung', 'dientich_san'], 'number'],
            [['sonha', 'tenduong', 'phuongxa', 'quanhuyen', 'soto', 'sothua', 'chusohuu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sonha' => 'Số Nhà',
            'tenduong' => 'Tên Đường',
            'phuongxa' => 'Phường/Xã',
            'quanhuyen' => 'Quận/Huyện',
            'dientich_dat' => 'Diện Tích Đất',
            'dientich_xaydung' => 'Diện Tích Xây Dựng',
            'dientich_san' => 'Diện Tích Sân',
            'soto' => 'Số Tờ',
            'sothua' => 'Số Thửa',
            'chusohuu' => 'Chủ Sở Hữu',
        ];
    }
}
