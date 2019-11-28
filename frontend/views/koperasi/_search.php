<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\KoperasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="koperasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'koperasi_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tanggal_berdiri') ?>

    <?= $form->field($model, 'tipe_koperasi_id') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'provinsi') ?>

    <?php // echo $form->field($model, 'kabupaten') ?>

    <?php // echo $form->field($model, 'kecamatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
