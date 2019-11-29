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

    <?= $form->field($model, 'tanah_bangunan')->widget(Toggle::className()); ?>

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
            // var suratKeterangan = $('.field-customsimpanpinjam-surat_keterangan');
            
            tanahBangunan.click(function() {
                if(tanahBangunan.children().hasClass('btn-success')) { 
                    console.log('off');
                    tanahBangunanChoices.hide();
                } else {
                    console.log('on');
                    tanahBangunanChoices.show();
                }
            });

            jenisKendaraan.click(function() {
                if(jenisKendaraan.children().hasClass('btn-success')) { 
                    console.log('off');
                    jenisKendaraanChoices.hide();
                } else {
                    console.log('on');
                    jenisKendaraanChoices.show();
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