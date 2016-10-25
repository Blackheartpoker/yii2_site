<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Search\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Source Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-index">

    <p> <?= Html::a('Create Source Message', ['create'], ['class' => 'btn btn-success']) ?> </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'message:ntext',
            'category',
            'id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="row"><div class="col-md-1">{update}</div><div class="col-md-1">{delete}</div></div>'
            ],
        ],
    ]); ?>
</div>
