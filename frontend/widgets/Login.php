<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 31.10.2016
 * Time: 18:54
 */

namespace frontend\widgets;

use common\models\LoginForm;
use yii\bootstrap\Widget;
use Yii;

class Login extends Widget{

    public function run(){

        $model = new LoginForm();

        if($model->load(Yii::$app->request->post()) && $model->login()){
            $controller = Yii::$app->controller;

            $controller->redirect(Yii::$app->getRequest()->getUrl());
        }

        return $this->render("login",['model' => $model]);
    }



}