<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\JaminanKendaraanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jaminan-kendaraan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jaminan_kendaraan_id') ?>

    <?= $form->field($model, 'nama_pemilik') ?>

    <?= $form->field($model, 'no_polisi') ?>

    <?= $form->field($model, 'merk') ?>

    <?= $form->field($model, 'tahun_pembuatan') ?>

    <?php // echo $form->field($model, 'warna') ?>

    <?php // echo $form->field($model, 'nilai_harga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
