<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lang */

$this->title = 'Update Lang: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LanguageMenuLabel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="lang-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'default')->radioList([
            '1' => 'yes',
            '0' => 'no',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
