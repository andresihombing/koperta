<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\AnggotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'anggota_id') ?>

    <?= $form->field($model, 'koperasi_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'dob') ?>

    <?= $form->field($model, 'no_ktp') ?>

    <?php // echo $form->field($model, 'alamat_lengkap') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'penjamin') ?>

    <?php // echo $form->field($model, 'perkawinan_ke') ?>

    <?php // echo $form->field($model, 'jumlah_anak') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
