<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomSimpanPinjam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-simpan-pinjam-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanah_bangunan')->textInput() ?>

    <?= $form->field($model, 'jenis_kendaraan')->textInput() ?>

    <?= $form->field($model, 'surat_keterangan')->textInput() ?>

    <?= $form->field($model, 'koperasi_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
