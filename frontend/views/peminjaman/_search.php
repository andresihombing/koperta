<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\PeminjamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'peminjaman_id') ?>

    <?= $form->field($model, 'anggota_id') ?>

    <?= $form->field($model, 'koperasi_id') ?>

    <?= $form->field($model, 'tujuan_kredit') ?>

    <?= $form->field($model, 'nilai_permohonan') ?>

    <?php // echo $form->field($model, 'angsuran_kredit') ?>

    <?php // echo $form->field($model, 'total_angsuran') ?>

    <?php // echo $form->field($model, 'pekerjaan_utama') ?>

    <?php // echo $form->field($model, 'pekerjaan_sampingan') ?>

    <?php // echo $form->field($model, 'pendapatan_sampingan') ?>

    <?php // echo $form->field($model, 'total_pendapatan_kotor') ?>

    <?php // echo $form->field($model, 'biaya_lainnya') ?>

    <?php // echo $form->field($model, 'biaya_pengeluaran') ?>

    <?php // echo $form->field($model, 'pendapatan_bersih') ?>

    <?php // echo $form->field($model, 'jaminan_tanah_bangunan_id') ?>

    <?php // echo $form->field($model, 'jaminan_kendaraan_id') ?>

    <?php // echo $form->field($model, 'jaminan_sk_id') ?>

    <?php // echo $form->field($model, 'banyak_pinjaman') ?>

    <?php // echo $form->field($model, 'plafon_terakhir') ?>

    <?php // echo $form->field($model, 'tanggal_pelunasan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
