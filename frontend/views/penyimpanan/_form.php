<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Penyimpanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penyimpanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'koperasi_id')->textInput() ?>

    <?= $form->field($model, 'anggota_id')->textInput() ?>

    <?= $form->field($model, 'nilai_simpanan')->textInput() ?>

    <?= $form->field($model, 'tgl_penyimpanan')->textInput() ?>

    <?= $form->field($model, 'petugas_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
