<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\TipeKoperasi;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Koperasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="koperasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <b>Tanggal Berdiri</b>
    <?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'tanggal_berdiri',    
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-M-dd'
        ]
    ])?>
    <br>
    
    <?= $form->field($model, 'tipe_koperasi_id')->dropDownList(
            ArrayHelper::map(TipeKoperasi::find()->all(), 'tipe_koperasi_id', 'tipe'),["prompt"=>"Tipe Koperasi"])->label('Tipe Koperasi')
    ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
