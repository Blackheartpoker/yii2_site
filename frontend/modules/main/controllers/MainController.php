<?php

namespace app\modules\main\controllers;

use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\SignupForm;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MainController extends \yii\web\Controller
{

    public $layout = "inner";

    public function actionRegister(){

        $model = new SignupForm();


        /**
         * enableAjaxValidation = true
         */
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->signup()){
           Yii::$app->session->setFlash('success', 'Add success');
        }
        return $this->render('register', ['model' => $model]);
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }




    public function actionContact(){

        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){

            $body = " <div>Body: <b> ".$model->body." </b></div>";
            $body .= " <div>Email: <b> ".$model->email." </b></div>";

            Yii::$app->common->sendMail($model->subject, $body );

            print "Send success";
            die;
        }

        return $this->render('contact', ['model' => $model]);
    }
}
