<?php

use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <?= $form->field($model, 'general_image')->widget(FileInput::classname(),[
        'options' => [
            'accept' => 'image/*',
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['file-upload-general']),
            'uploadExtraData' => [
                'advert_id' => $model->idadvert,
            ],
            'allowedFileExtensions' =>  ['jpg', 'png','gif'],
            'initialPreview' => $image,
            'showUpload' => true,
            'showRemove' => false,
            'dropZoneEnabled' => true
        ]
    ]);
    ?>

</div>

<div class="row">
    <?= Html::label('Images');
    echo FileInput::widget([
        'name' => 'images',
        'options' => [
            'accept' => 'image/*',
            'multiple'=>true
        ],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['file-upload-images']),
            'uploadExtraData' => [
                'advert_id' => $model->idadvert,
            ],
            'overwriteInitial' => false,
            'allowedFileExtensions' =>  ['jpg', 'png','gif'],
            'initialPreview' => $images_add,
            'showUpload' => true,
            'showRemove' => true,
            'dropZoneEnabled' => true
        ]
    ]);
    ?>

</div>

<br><br>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
