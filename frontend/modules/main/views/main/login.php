<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
?>

<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

        <? $form = ActiveForm::begin(); ?>

            <?=$form->field($model,'username') ?>
            <?=$form->field($model,'password')->passwordInput() ?>
            <?=$form->field($model,'rememberMe')->checkbox() ?>

        <?=Html::submitButton('Login',['class' => 'btn btn-success']) ?>

        <?     ActiveForm::end();   ?>


        <?php
        if (Yii::$app->getSession()->hasFlash('error')) {
            echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
        }
        ?>
        ...
        <p class="lead">Do you already have an account on one of these sites? Click the logo to log in with it here:</p>
        <?php echo \nodge\eauth\Widget::widget(array('action' => '/main/main/login')); ?>



</div>

    </div>