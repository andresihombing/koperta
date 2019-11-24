<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanKendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jaminan-kendaraan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jaminan_kendaraan_id')->textInput() ?>

    <?= $form->field($model, 'nama_pemilik')->textInput() ?>

    <?= $form->field($model, 'no_polisi')->textInput() ?>

    <?= $form->field($model, 'merk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_pembuatan')->textInput() ?>

    <?= $form->field($model, 'warna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_harga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
