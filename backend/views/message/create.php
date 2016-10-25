<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SourceMessage */
/* @var $message backend\models\Message */
/* @var $getlangs array */

$this->title = 'Create Source Message';
$this->params['breadcrumbs'][] = ['label' => 'Source Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="source-message-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'message')->textarea(['rows' => 4]) ?>
        <div class="row">
            <?php foreach ($getlangs as $lang):?>
                <div class="col-md-4">
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><?=$lang->name?></h3>
                        </div>
                        <div class="box-body">
                            <?= $form->field($message, 'translation[]')->textarea(['rows' => 4]) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Create', ['class' =>  'btn btn-success' ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
