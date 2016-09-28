<?php

namespace frontend\controllers;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMain()
    {
        return $this->render('main');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
