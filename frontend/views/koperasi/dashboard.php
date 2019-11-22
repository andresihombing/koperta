<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            <?= Html::submitButton('Pilih Fitur', ['class' => 'btn btn-primary', 'disabled' => 'disabled']) ?>
        </p>
    <?php } else { ?>
        <p>
            <?= Html::submitButton('Pilih Fitur', ['class' => 'btn btn-primary']) ?>
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
<!-- 
    <?=dosamigos\highcharts\HighCharts::widget([
    'clientOptions' => [
        'chart' => [
                'type' => 'bar'
        ],
        'title' => [
             'text' => 'Fruit Consumption'
             ],
        'xAxis' => [
            'categories' => [
                'Apples',
                'Bananas',
                'Oranges'
            ]
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Fruit eaten'
            ]
        ],
        'series' => [
            ['name' => 'Jane', 'data' => [1, 0, 4]],
            ['name' => 'John', 'data' => [5, 7, 3]]
        ]
    ]
]); ?> -->

</div>
