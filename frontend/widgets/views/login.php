<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 31.10.2016
 * Time: 19:02
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<!-- Modal -->
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Login</h4>
                    <?php $form = ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::to(['/validate/index']),
                    ])?>
                    <?=$form->field($model, 'username')->label(false)?>
                    <?=$form->field($model, 'password')->passwordInput()->label(false)?>
                    <?=$form->field($model, 'rememberMe')->checkbox()?>

                    <?=Html::submitButton('Sign in', ['class'=> 'btn btn-success'])?>

                    <?php ActiveForm::end();?>
                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='register.html'">Join Now</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

