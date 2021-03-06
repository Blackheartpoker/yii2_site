<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\LangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LanguageMenuLabel');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lang-index">
    <p>
        <?= Html::a('Create Lang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'url',
            'default',
            'id',
//            'date_update',
            // 'date_create',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="row"><div class="col-md-1">{update}</div><div class="col-md-1">{delete}</div></div>'
            ],
        ],
    ]); ?>
</div>
