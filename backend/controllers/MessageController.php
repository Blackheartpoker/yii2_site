<?php

namespace backend\controllers;

use Yii;
use backend\models\SourceMessage;
use backend\models\Message;
use common\models\Lang;
use backend\models\Search\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for SourceMessage model.
 */
class MessageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SourceMessage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new SourceMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SourceMessage();
        $message = new Message();
        $langs = new Lang();
        $getlangs = $langs->getLangs();

        if ($model->load(Yii::$app->request->post())&& $model->save()) {
                foreach ($getlangs as $key => $lang){
                    $message = new Message();
                    $message->load(Yii::$app->request->post());
                    $message->saveMessages($model->id, $lang, $key);
                }
                return $this->redirect(['index']);

        } else {
            return $this->render('create', [
                'model' => $model,
                'message' => $message,
                'getlangs' => $getlangs,
            ]);
        }
    }

    /**
     * Updates an existing SourceMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $message = new Message();
        $getMessages = $message->getMessages($id);
        $langs = new Lang();
        $getlangs = $langs->getLangs();

        if ($model->load(Yii::$app->request->post())&& $model->save()) {
            foreach ($getlangs as $key => $lang){
                $message = $this->findModelMessage($model->id, $lang->url);
                $message->load(Yii::$app->request->post());
                $message->saveMessages($model->id, $lang, $key);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'message' => $message,
                'getlangs' => $getlangs,
                'getMessages' => $getMessages,
            ]);
        }
    }

    /**
     * Deletes an existing SourceMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SourceMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SourceMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SourceMessage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelMessage($id, $lang)
    {
        $messageModule = new Message();
        if (( $message = $messageModule::find()->where('`id` = :id and `language` = :language',  [':id' => $id, ':language' => $lang])->one()) !== null) {
            return $message;
        } else {
            return $messageModule;
        }
    }
}
