<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\CicilanPeminjamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cicilan-peminjaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cicilan_peminjaman_id') ?>

    <?= $form->field($model, 'peminjaman_id') ?>

    <?= $form->field($model, 'tanggal_transaksi') ?>

    <?= $form->field($model, 'angsuran_ke') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'mutasi_pokok') ?>

    <?php // echo $form->field($model, 'mutasi_bunga') ?>

    <?php // echo $form->field($model, 'jumlah_angsuran') ?>

    <?php // echo $form->field($model, 'saldo_akhir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
