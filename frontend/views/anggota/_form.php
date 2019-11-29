<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-form">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'koperasi_id')->hiddenInput(['value' => $_SESSION['koperasi_id']])->label(false)?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label("Nama") ?>

            <?= $form->field($model, 'email')->textInput() ?>

            <!-- <?= $form->field($model, 'dob')->textInput() ?> -->
            
            <?= $form->field($model, 'dob')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                    'inline' => false,
                    'options' => ['placeholder'=>"dd-mm-yyyy",],
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy'
                    ]
                ])->label("Tanggal Lahir")?>

            <?= $form->field($model, 'no_ktp')->textInput() ?>

            <?= $form->field($model, 'alamat_lengkap')->textArea(['maxlength' => true]) ?>

            <!-- <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?> -->

            <?= $form->field($model, 'status')->dropDownList(
                ['menikah' => 'Menikah', 'belum menikah' => 'Belum Menikah'], ['prompt' => 'Pilih Status']
             ) ?>


            <?= $form->field($model, 'perkawinan_ke')->textInput() ?>

            <?= $form->field($model, 'jumlah_anak')->textInput() ?>

            <?= $form->field($model, 'kk')->fileInput() ?>

            <?= $form->field($model, 'ktp')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3"></div>
    </div>

</div>
