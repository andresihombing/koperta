<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\highcharts\HighCharts;

/* @var $this yii\web\View */
/* @var $model frontend\models\Koperasi */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Koperasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="koperasi-view">
    <?php if ($model->status == 0){ ?>
        <?= Yii::$app->session->setFlash('success', "Berhasil Melakukan Pendaftaran.<br>Selanjutnya Menunggu Approve dari Admin."); ?>
        <p>
            <?= Html::a('Pilih Fitur','', ['class' => 'btn btn-primary', 'disabled' => 'disabled']) ?>
        </p>
    <?php } else { ?>
        <p>
            <!-- <?= Html::a('Peminjaman', ['peminjaman/create'], ['class' => 'btn btn-primary']) ?> -->
            <?= Html::a('Pilih Fitur', ['/koperasi/fitur', 'id' => $_GET['id']], ['class' => 'btn btn-primary']) ?>
        </p>    
    <?php } ?>


    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->koperasi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->koperasi_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [            
            'name',
            'tanggal_berdiri',
            'tipe.tipe',            
            'alamat',
            'deskripsi:ntext',
            'kode_pos',
            'provinsi',
            'kabupaten',
            'kecamatan',
        ],
    ]) ?>

<!-- <?=
HighCharts::widget([   
    'clientOptions' => [
        'chart' => ['type' => 'pie'],
        'title' => ['text' => 'Data Realisasi Tahunan'],
        'legend' => ['enabled' => TRUE],

        'showInLegend'=> ['enable' =>true],

        'plotOptions' => [
        'pie' => [
            'allowPointSelect'=> false,
            'cursor'=> 'pointer',
            // 'colors'=> 'pieColors',
            'dataLabels'=> [
                'enabled'=> true,
                'format'=> '<b>{point.name}</b><br>{point.percentage:.1f} %',
                // 'distance'=> -50,
                // 'filter'=> [
                //     'property'=> 'percentage',
                //     'operator'=> '>',
                //     'value'=> 4
                // ]
            ],
            'showInLegend'=> true
        ]
    ],

    'series' => [[// mind the [[ instead of [


        'type' => 'pie',
        'name' => 'Jumlah',
        'data' => [
                [
                    'name' => 'Terealisasi',
                    'y' => 1,
                    'color' => '#FF2E2E'
                ],
                [
                    'name' => 'Tidak Terealisasi',
                    'y' => 2,
                    'color' => '#2EFFB0'
                ],
                [
                    'name' => 'Terealisasi Sebagian',
                    'y' => 3,
                    'color' => '#7cb5ec'
                ],
              ]
        ]],
    ]
]);

?> -->

</div>
