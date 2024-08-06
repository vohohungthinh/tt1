<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Contact;
use app\models\Country;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Chỉ cho phép người dùng đã đăng nhập
                        'matchCallback' => function ($rule, $action) {
                            // Kiểm tra xem người dùng có vai trò admin hay không
                            return Yii::$app->user->identity->role === 'admin';
                        },
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->user->setReturnUrl(Yii::$app->request->url);
            return $this->redirect(['site/login'])->send();
        }

        return parent::beforeAction($action);
    }

    public function actionDashboard()
    {
        return $this->render('index');
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContacts()
    {
        $contacts = Contact::find()->all();
        return $this->render('contacts', [
            'contacts' => $contacts,
        ]);
    }

    public function actionCountries()
    {
        $countries = Country::find()->all();
        return $this->render('countries', [
            'countries' => $countries,
        ]);
    }
}
