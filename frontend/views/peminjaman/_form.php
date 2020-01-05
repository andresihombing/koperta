<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Anggota;
use frontend\models\CustomSimpanPinjam;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\widgets\MaskedInputAsset;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
MaskedInputAsset::register($this);
?>

<?php 
$jaminan = CustomSimpanPinjam::find()->where(['koperasi_id' => $_SESSION['koperasi_id']])->one();
$anggota = Anggota::find()->all();
$data = ArrayHelper::map($anggota, 'anggota_id', 'name'); 
$tipe = ['minggu' => 'Minggu', 'bulan' => 'Bulan'];
?>

<div class="peminjaman-form">

    <div class="col-md-6">
        <h4 class="text-center">Data Peminjaman</h4><hr>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'anggota_id')->widget(Select2::classname(), [
            'data' => $data,
            'options' => ['placeholder' => 'Pilih Anggota ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Anggota'); ?>

        <?= $form->field($model, 'tujuan_kredit')->textarea(['rows' => 6]) ?>
        

        <?= $form->field($model, 'tipe_angsuran')->dropDownList(['minggu' => 'Minggu', 'bulan' => 'Bulan'],['prompt'=>'Pilih Tipe'])?>

        <?= $form->field($model, 'lama_angsuran')->textInput([
            'type' => 'number'  
        ]) ?>

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

        <?= $form->field($model, 'banyak_pinjaman')->textInput() ?>

        <?= $form->field($model, 'plafon_terakhir')->textInput() ?>

        <b>Tanggal Pelunasan</b>
        <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'tanggal_pelunasan',    
        'template' => '{addon}{input}',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ])?>
        <br>
    </div>

    <div class="col-md-6">

    <!-- jaminan kendaraan -->
        <?php if ($jaminan->jenis_kendaraan == 1) { ?>
        <h4 class="text-center">Jaminan Kendaraan</h4><hr>
            <?= $form->field($model, 'nama_pemilik_kendaraan')->textInput() ?>

            <?= $form->field($model, 'no_polisi_kendaraan')->textInput() ?>

            <?= $form->field($model, 'merk_kendaraan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tahun_pembuatan_kendaraan')->textInput() ?>

            <?= $form->field($model, 'warna_kendaraan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nilai_harga_kendaraan')->textInput() ?>
        <?php } ?>    

        <!-- jaminan tanah bangunan -->        
        <?php if ($jaminan->bangunan == 1) { ?>
        <br><br><h4 class="text-center">Jaminan Bangunan</h4><hr>
            <?= $form->field($model, 'nama_pemilik_bangunan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_bangunan')->textInput() ?>

            <?= $form->field($model, 'status_hak_milik_bangunan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'luas_bangunan')->textInput() ?>
        <?php } ?> 

        <!-- jaminan tanah tanah -->        
        <?php if ($jaminan->tanah == 1) { ?>
        <br><br><h4 class="text-center">Jaminan Tanah</h4><hr>
            <?= $form->field($model, 'nama_pemilik_tanah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_tanah')->textInput() ?>

            <?= $form->field($model, 'status_hak_milik_tanah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'luas_tanah')->textInput() ?>
        <?php } ?>    
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
    $this->registerJs(" 
        var nilaiPermohonan = $('#peminjaman-nilai_permohonan');
        var angsuranKredit = $('#peminjaman-angsuran_kredit');
        var lamaAngsuran = $('#peminjaman-lama_angsuran');
        var totalSemuaAngsuran = $('#peminjaman-total_angsuran');

        nilaiPermohonan.inputmask('currency', {radixPoint:'.', prefix: 'Rp ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        nilaiPermohonan.keypress(function(event){
            isNumber(event);
        });

        angsuranKredit.inputmask('currency', {radixPoint:'.', prefix: 'Rp ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        angsuranKredit.keypress(function(event){
            isNumber(event);
        });

        totalSemuaAngsuran.inputmask('currency', {radixPoint:'.', prefix: 'Rp ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        totalSemuaAngsuran.keypress(function(event){
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

        function calculateAngsuran(){
            var bunga = nilaiPermohonan.val() * 0.02;
            var lama = nilaiPermohonan.val() /  lamaAngsuran.val();

            var total = bunga + lama;
            var totalAngsuran = total * lamaAngsuran.val();            

            angsuranKredit.val(Math.round(total));
        }

        function totAngsuran(){
            var bunga = nilaiPermohonan.val() * 0.02;
            var lama = nilaiPermohonan.val() /  lamaAngsuran.val();

            var total = bunga + lama;
            var totalAngsuran = total * lamaAngsuran.val();            

            totalSemuaAngsuran.val(Math.round(totalAngsuran));
        }

        nilaiPermohonan.on('keyup', function() {
            calculateAngsuran();
        });

        nilaiPermohonan.on('keyup', function() {
            totAngsuran();
        });


    ", $this::POS_END);
?>
