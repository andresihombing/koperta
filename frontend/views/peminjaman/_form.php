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
    $anggota = Anggota::find()->where(['koperasi_id' => $_SESSION['koperasi_id']])->all();
    $data = ArrayHelper::map($anggota, 'anggota_id', 'name'); 
    $tipe = ['minggu' => 'Minggu', 'bulan' => 'Bulan'];
    $bungaMingguan = $jaminan->bunga_peminjaman_mingguan;
    $bungaBulanan = $jaminan->bunga_peminjaman_bulanan;
    $labelAngsuran = ($jaminan->mingguan == 1) ? "Lama Angsuran (Minggu)" : "Lama Angsuran (Bulan)";
?>

<div class="peminjaman-form">

    <div class="col-md-6">
        <h4 class="text-center">Data Peminjaman</h4><hr>

        <?php $form = ActiveForm::begin(); ?>
        
        <?php
            if($model->anggota_id == null){
                echo $form->field($model, 'anggota_id')->widget(Select2::classname(), [
                    'data' => $data,
                    'options' => ['placeholder' => 'Pilih Anggota ...'],
                    'pluginOptions' => [
                    
                        'allowClear' => true
                    ],
                ])->label('Anggota');
            }else{
                $form->field($model, 'anggota_id')->widget(Select2::classname(), [
                    'data' => $data,
                    'options' => ['placeholder' => 'Pilih Anggota ...', 'disable' => true],
                    'pluginOptions' => [
                    
                        'allowClear' => true
                    ],
                ])->label('Anggota');
            }
        ?>

        <?= $form->field($model, 'tujuan_kredit')->textarea(['rows' => 6]) ?>

        <?php 
            if($jaminan->mingguan == 1 && $jaminan->bulanan == 1) {
                echo $form->field($model, 'tipe_angsuran')->dropDownList(['minggu' => 'Minggu', 'bulan' => 'Bulan'],['prompt'=>'Pilih Tipe']);
            }else{
                $form->field($model, 'tipe_angsuran')->dropDownList(['minggu' => 'Minggu', 'bulan' => 'Bulan'],['prompt'=>'Pilih Tipe', 'required' => 'false']);
            }
        ?>

        <?php 
            if($jaminan->mingguan == 1 && $jaminan->bulanan == 1) {
                echo $form->field($model, 'lama_angsuran')->textInput(['type' => 'number']);
            }else{
                echo $form->field($model, 'lama_angsuran')->textInput(['type' => 'number'])->label($labelAngsuran);
            }
        ?>

        <?= $form->field($model, 'nilai_permohonan')->textInput() ?>

        <?= $form->field($model, 'angsuran_kredit')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'total_angsuran')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'pekerjaan_utama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pekerjaan_sampingan')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'pendapatan_usaha')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pendapatan_sampingan')->textInput() ?>

        <?= $form->field($model, 'total_pendapatan_kotor')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'biaya_lainnya')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'biaya_pengeluaran')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'pendapatan_bersih')->textInput(['readonly' => true]) ?>

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
        <?php } 
            if($model->jaminan_kendaraan_id != null){
                echo Html::a('Hapus Jaminan', ['jaminan-kendaraan/delete', 'id' => $model->jaminan_kendaraan_id, 'form' => $_GET['id']], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Hapus sebagai jaminan?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?>
        

        <!-- jaminan tanah bangunan -->        
        <?php if ($jaminan->bangunan == 1) { ?>
        <br><br><h4 class="text-center">Jaminan Bangunan</h4><hr>
            <?= $form->field($model, 'nama_pemilik_bangunan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_bangunan')->textInput() ?>

            <?= $form->field($model, 'status_hak_milik_bangunan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'luas_bangunan')->textInput() ?>
        <?php } 
            if($model->jaminan_bangunan_id != null){
                echo Html::a('Hapus Jaminan', ['jaminan-bangunan/delete', 'id' => $model->jaminan_bangunan_id, 'form' => $_GET['id']], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Hapus sebagai jaminan?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?> 

        <!-- jaminan tanah tanah -->        
        <?php if ($jaminan->tanah == 1) { ?>
        <br><br><h4 class="text-center">Jaminan Tanah</h4><hr>
            <?= $form->field($model, 'nama_pemilik_tanah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_tanah')->textInput() ?>

            <?= $form->field($model, 'status_hak_milik_tanah')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'luas_tanah')->textInput() ?>
        <?php } 
            if($model->jaminan_tanah_id != null){
                echo Html::a('Hapus Jaminan', ['jaminan-tanah/delete', 'id' => $model->jaminan_tanah_id, 'form' => $_GET['id']], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Hapus sebagai jaminan?',
                        'method' => 'post',
                    ],
                ]);
            }
        ?>   
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
    $js = <<< JS
        var nilaiPermohonan = $('#peminjaman-nilai_permohonan');
        var angsuranKredit = $('#peminjaman-angsuran_kredit');
        var lamaAngsuran = $('#peminjaman-lama_angsuran');
        var totalSemuaAngsuran = $('#peminjaman-total_angsuran');
        var tipeAngsuran = $('#peminjaman-tipe_angsuran');
        var pendapatanSampingan = $('#peminjaman-pendapatan_sampingan');
        var totalPendapatanKotor = $('#peminjaman-total_pendapatan_kotor');
        var biayaLainnya = $('#peminjaman-biaya_lainnya');
        var totalBiayaLainnya = $('#peminjaman-biaya_pengeluaran');
        var pendapatanBersih = $('#peminjaman-pendapatan_bersih');
        var pendapatanUsaha = $('#peminjaman-pendapatan_usaha');
        var plafonTerakhir = $('#peminjaman-plafon_terakhir');
        var besarBunga = 0;
        
        if(tipeAngsuran.length) {
            tipeAngsuran.change(function() {
                if(tipeAngsuran.val() == 'minggu')
                    besarBunga = $bungaMingguan;
                else
                    besarBunga = $bungaBulanan;
            })
        }else{
            if($jaminan->mingguan == 1)
                besarBunga = $bungaMingguan;
            else
                besarBunga = $bungaBulanan;
        }

        nilaiPermohonan.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        nilaiPermohonan.keypress(function(event){
            isNumber(event);
        });

        angsuranKredit.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        angsuranKredit.keypress(function(event){
            isNumber(event);
        });

        totalSemuaAngsuran.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        totalSemuaAngsuran.keypress(function(event){
            isNumber(event);
        });

        pendapatanSampingan.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        pendapatanSampingan.keypress(function(event){
            isNumber(event);
        });

        totalPendapatanKotor.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        totalPendapatanKotor.keypress(function(event){
            isNumber(event);
        });

        biayaLainnya.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        biayaLainnya.keypress(function(event){
            isNumber(event);
        });

        totalBiayaLainnya.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        totalBiayaLainnya.keypress(function(event){
            isNumber(event);
        });

        pendapatanBersih.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        pendapatanBersih.keypress(function(event){
            isNumber(event);
        });

        pendapatanUsaha.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        pendapatanUsaha.keypress(function(event){
            isNumber(event);
        });

        plafonTerakhir.inputmask('currency', {radixPoint:'.', prefix: 'Rp. ', 'autoUnmask' : true, removeMaskOnSubmit: true});
        plafonTerakhir.keypress(function(event){
            isNumber(event);
        });

        nilaiPermohonan.on('keyup', function() {
            calculateAngsuran();
        });

        nilaiPermohonan.on('keyup', function() {
            totAngsuran();
        });

        biayaLainnya.on('keyup', function(){
            totalBiayaLainnya.val(biayaLainnya.val())
            subTotalPendapatanBersih();
        })

        pendapatanUsaha.on('keyup', function(){
            totalKotor();
        })

        pendapatanSampingan.on('keyup', function(){
            totalKotor();
        })

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
            var bunga = nilaiPermohonan.val() * (besarBunga / 100);
            var lama = nilaiPermohonan.val() /  lamaAngsuran.val();

            var total = bunga + lama;
            var totalAngsuran = total * lamaAngsuran.val();            

            angsuranKredit.val(Math.round(total));
        }

        function totAngsuran(){
            var bunga = nilaiPermohonan.val() * (besarBunga / 100);
            var lama = nilaiPermohonan.val() /  lamaAngsuran.val();

            var total = bunga + lama;
            var totalAngsuran = total * lamaAngsuran.val();            

            totalSemuaAngsuran.val(Math.round(totalAngsuran));
        }

        function subTotalPendapatanBersih(){
            var tot = totalPendapatanKotor.val() - totalBiayaLainnya.val();
            
            pendapatanBersih.val(Math.round(tot));
        }

        function totalKotor(){
            var tot = Number(pendapatanUsaha.val()) + Number(pendapatanSampingan.val());
            console.log(tot);
            totalPendapatanKotor.val(Math.round(tot));
        }
        
    JS;

    $this->registerJs($js, $this::POS_END);
?>
