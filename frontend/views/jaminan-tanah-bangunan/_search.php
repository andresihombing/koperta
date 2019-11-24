<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\JaminanTanahBangunanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jaminan-tanah-bangunan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jaminan_tanah_bangunan_id') ?>

    <?= $form->field($model, 'nama_pemilik') ?>

    <?= $form->field($model, 'no') ?>

    <?= $form->field($model, 'status_hak_milik') ?>

    <?= $form->field($model, 'luas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
