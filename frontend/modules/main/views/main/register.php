<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use \yii\bootstrap\ActiveForm;
use \yii\bootstrap\Html;

?>
<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'enableAjaxValidation' => true
        ])?>

        <?php echo $form->field($model,'username')->textInput(['autofocus' => true]);?>

        <?php echo $form->field($model, 'email');?>

        <?php echo $form->field($model, 'password')->passwordInput();?>

        <?php echo $form->field($model, 'repassword')->passwordInput();?>

        <?php echo Html::submitButton('Sing Up',['class' => 'btn btn-success']);?>

        <?php $form=ActiveForm::end();?>
    </div>
</div>
