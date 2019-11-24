<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'anggota_id')->textInput() ?>

    <?= $form->field($model, 'koperasi_id')->textInput() ?>

    <?= $form->field($model, 'tujuan_kredit')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nilai_permohonan')->textInput() ?>

    <?= $form->field($model, 'angsuran_kredit')->textInput() ?>

    <?= $form->field($model, 'total_angsuran')->textInput() ?>

    <?= $form->field($model, 'pekerjaan_utama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_sampingan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendapatan_sampingan')->textInput() ?>

    <?= $form->field($model, 'total_pendapatan_kotor')->textInput() ?>

    <?= $form->field($model, 'biaya_lainnya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biaya_pengeluaran')->textInput() ?>

    <?= $form->field($model, 'pendapatan_bersih')->textInput() ?>

    <?= $form->field($model, 'jaminan_tanah_bangunan_id')->textInput() ?>

    <?= $form->field($model, 'jaminan_kendaraan_id')->textInput() ?>

    <?= $form->field($model, 'jaminan_sk_id')->textInput() ?>

    <?= $form->field($model, 'banyak_pinjaman')->textInput() ?>

    <?= $form->field($model, 'plafon_terakhir')->textInput() ?>

    <?= $form->field($model, 'tanggal_pelunasan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
