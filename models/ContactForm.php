<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $body;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, phone and body are required
            [['name', 'email', 'phone', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Phone Number',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    
    public function sendEmail($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom('tvox303@gmail.com')
                ->setReplyTo([$this->email => $this->name])
                ->setSubject('Contact Form Submission')
                ->setTextBody("Phone: {$this->phone}\n\nMessage: {$this->body}")
                ->send();

            return true;
        }
        return false;
    }
}
