<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanTanah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jaminan-tanah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pemilik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no')->textInput() ?>

    <?= $form->field($model, 'status_hak_milik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'luas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
