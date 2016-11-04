<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 31.10.2016
 * Time: 19:18
 */

namespace frontend\controllers;

use common\models\LoginForm;
use yii\base\Controller;
use yii\filters\VerbFilter;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;


class ValidateController extends Controller{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get', 'post'],
                    'subscribe' => ['get', 'post'],
                ],
            ],
        ];
    }


    public function actionIndex(){

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

}