<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use lo\widgets\Toggle;

$this->title = "Kustomisasi Koperasi Anda";
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['koperasi/dashboard', 'id' => $model->koperasi_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="fitur-koperasi">
 
    <h2><?= Html::encode($this->title) ?></h2><hr style="background: #898e94; height: 5px; border-color : transparent;" />


    <?php $form = ActiveForm::begin() ?>

    <?= "<h3>Jenis Pinjaman</h3>" ?>

    <?= $form->field($model, 'mingguan')->widget(Toggle::className()); ?>

    <?= $form->field($model, 'bulanan')->widget(Toggle::className()); ?>

    <?= "<h3>Bunga</h3>" ?>

    <?= $form->field($model, 'bunga_penyimpanan')->textInput(['maxLength' => true]) ?>

    <?= $form->field($model, 'bunga_peminjaman_mingguan')->textInput(['maxLength' => true]) ?>

    <?= $form->field($model, 'bunga_peminjaman_bulanan')->textInput(['maxLength' => true]) ?>

    <?= "<h3>Jenis Jaminan</h3>" ?>

    <?= $form->field($model, 'tanah')->widget(Toggle::className()); ?>

    <?= $form->field($model, 'bangunan')->widget(Toggle::className()); ?>

    <?= $form->field($model, 'jenis_kendaraan')->widget(Toggle::className()); ?>

    <div class="form-group">
        <?= Html::a("Batal", ['koperasi/dashboard', 'id' => $id], ['class' => 'btn btn-danger']) ?>
        <?= Html::submitButton('Simpan Kustomisasi', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>

</div>

<?php

    $this->registerJs("

        $(document).ready(function() {
            var tanahBangunan = $('.field-customsimpanpinjam-tanah_bangunan');
            var jenisKendaraan = $('.field-customsimpanpinjam-jenis_kendaraan');
            var pinjamanMingguan = $('.field-customsimpanpinjam-mingguan');
            var pinjamanBulanan = $('.field-customsimpanpinjam-bulanan');
            var bungaMingguan = $('.field-customsimpanpinjam-bunga_peminjaman_mingguan');
            var bungaBulanan = $('.field-customsimpanpinjam-bunga_peminjaman_bulanan');
            // var suratKeterangan = $('.field-customsimpanpinjam-surat_keterangan');
            
            if(pinjamanMingguan.children().hasClass('btn-success')) { 
                bungaMingguan.show();
            } else {
                bungaMingguan.hide();
            }

            if(pinjamanBulanan.children().hasClass('btn-success')) { 
                bungaBulanan.show();
            } else {
                bungaBulanan.hide();
            }

            pinjamanMingguan.click(function() {
                if(pinjamanMingguan.children().hasClass('btn-success')) { 
                    bungaMingguan.hide();
                } else {
                    bungaMingguan.show();
                }
            });

            pinjamanBulanan.click(function() {
                if(pinjamanBulanan.children().hasClass('btn-success')) { 
                    bungaBulanan.hide();
                } else {
                    bungaBulanan.show();
                }
            });

            // suratKeterangan.click(function() {
            //     if(suratKeterangan.children().hasClass('btn-success')) { 
            //         console.log('off');
            //     } else {
            //         console.log('on');
            //     }
            // });

        });

    ", $this::POS_END);

?>