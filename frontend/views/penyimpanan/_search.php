<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PenyimpananSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penyimpanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'penyimpanan_id') ?>

    <?= $form->field($model, 'koperasi_id') ?>

    <?= $form->field($model, 'anggota_id') ?>

    <?= $form->field($model, 'nilai_simpanan') ?>

    <?= $form->field($model, 'tgl_penyimpanan') ?>

    <?php // echo $form->field($model, 'petugas_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
