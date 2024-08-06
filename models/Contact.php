<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $body
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'body'], 'required'],
            [['body'], 'string'],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            ['message', 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'body' => 'Body',
        ];
    }
}
