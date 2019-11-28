<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\CustomSimpanPinjamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-simpan-pinjam-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'simpan_pinjam_id') ?>

    <?= $form->field($model, 'tanah_bangunan') ?>

    <?= $form->field($model, 'jenis_kendaraan') ?>

    <?= $form->field($model, 'surat_keterangan') ?>

    <?= $form->field($model, 'koperasi_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
