<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Anggota;
use frontend\models\PenyimpananTipe;
use kartik\select2\Select2;
use yii\widgets\MaskedInputAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\Penyimpanan */
/* @var $form yii\widgets\ActiveForm */
MaskedInputAsset::register($this);
?>

<div class="penyimpanan-form">

    <div>

    <?php $form = ActiveForm::begin(); ?>

        <div class="box-body">
          <div class="form-group">
            <label for="nama_nasabah" class="col-sm-2 control-label">Nama Nasabah</label>

            <div class="col-sm-10">
              <?= $form->field($model, 'anggota_id')->widget(Select2::classname(), 
                [
                    'data' => ArrayHelper::map(Anggota::find()->orderBy('name')->where(['koperasi_id' => $_SESSION['koperasi_id']])->all(), 'anggota_id', 'name'),
                    'options' => ['placeholder' => 'Pilih nasabah...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ])->label(false)
              ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Tipe Transaksi</label>

            <div class="col-sm-10">
              <?= $form->field($model, 'tipe_penyimpanan_id')->dropDownList(
                ArrayHelper::map(PenyimpananTipe::find()->all(), 'tipe_penyimpanan_id', 'name'),["prompt"=>"Pilih tipe penyimpanan..."])->label(false)
              ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Besar Transaksi</label>

            <div class="col-sm-10">
              <?= $form->field($model, 'nilai_transaksi')->textInput()->label(false) ?> 
            </div>
          </div>

          <div class="form-group" style="text-align: right; padding-right: 1em">
            <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah ', ['class' => 'btn btn-success']) ?>
          </div>
        </div>

      <?php ActiveForm::end(); ?>

    </div>

 

</div>


<?php
  $js = <<< JS

    var besarTransaksi = $('#penyimpanan-nilai_transaksi');

    besarTransaksi.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
    besarTransaksi.keypress(function(event){
        isNumber(event);
    });

    function isNumber(event){
            var charCode = event.which;
            // backspace & delete
            if (charCode == 46 || charCode == 8) {
                // nothing
            }else{
                // dot(titik) & space(spasi)
                if (charCode === 190 || charCode === 32) {
                    event.preventDefault();
                }
                // other than number 0 - 9
                if (charCode < 48 || charCode > 57) {
                    event.preventDefault();
                }
            }
            return true;
        }

  JS;

  $this->registerJs($js, $this::POS_END);
?>