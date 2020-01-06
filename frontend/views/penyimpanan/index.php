<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\components\ToolsColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PenyimpananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Penyimpanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyimpanan penyimpanan-index">
    <div class="container">

        <div class="penyimpanan-top">
            <div class="penyimpanan-title">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>
            <div class="penyimpanan-button">
                <p><?= Html::a('Transaksi Baru', ['create'], ['class' => 'btn btn-success']) ?></p>
            </div>
        </div>

        <div class="penyimpanan-box">
            <div class="box box-primary" >
             <?php
                Pjax::begin();
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'id' => 'tabel-izin-bermalam',
                    'tableOptions' => [
                        'class' => 'table table-stripped table-condensed table-bordered', 
                        'style' => 'font-size:12px;'
                    ],
                    'rowOptions' => function($model){
                        
                    },
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn', 
                            'headerOptions' => ['style' => 'width:35px']],
                        [
                            'attribute' => 'tgl_transaksi',
                            'label'=>'Tanggal Transaksi',
                            'format' => 'raw',
                            'value'=> 'tgl_transaksi',
                            'headerOptions' => ['style' => 'width:15%'],
                        ],
                        [
                            'attribute' => 'tipe_penyimpanan_id',
                            'label'=>'Tipe Penyimpanan',
                            'format' => 'raw',
                            'value'=> 'tipePenyimpanan.name'
                        ],
                        [
                            'attribute' => 'anggota_id',
                            'label'=>'Nama Nasabah',
                            'format' => 'raw',
                            'value'=> 'anggota.name'
                        ],
                        [
                            'attribute' => 'nilai_transaksi',
                            'label' => 'Nominal Transaksi',
                            'format' => 'raw',
                            'value' => 'nilai_transaksi',
                        ],
                        // [
                        //     'attribute' => 'petugas_id',
                        //     'label' => 'Petugas',
                        //     'format' => 'raw',
                        //     'value' => 'petugas.name',
                        // ],
                        // [
                        //     'attribute' => '',
                        //     'label' => 'Total Simpanan',
                        //     'format' => 'raw',
                        //     'value' => function ($model){
                                
                        //     },
                        // ],
                        ['class' => 'common\components\ToolsColumn',
                            'template' => '{view} {edit} {delete}',
                            'header' => 'Aksi',
                            'buttons' => [
                                'view' => function ($url, $model){
                                    return ToolsColumn::renderCustomButton($url, $model, 'Lihat Detail', 'glyphicon glyphicon-eye-open');
                                },
                                'edit' => function ($url, $model){
                                    return ToolsColumn::renderCustomButton($url, $model, 'Edit Transaksi', 'glyphicon glyphicon-pencil');
                                },
                            ],
                            'urlCreator' => function ($action, $model, $key, $index){
                                if ($action === 'view') {
                                    return Url::toRoute(['view', 'id' => $key]);
                                } 
                                else if ($action === 'edit') {
                                    return Url::toRoute(['update', 'id' => $key]);
                                } 
                                else if ($action === 'delete') {
                                    return Url::toRoute(['delete', 'id' => $key]);
                                }
                            }
                        ]
                    ],
                ]);
                Pjax::end() ?>      
            </div>
        </div>

    </div>
</div>

<style type="text/css">
    .tbl_simpanan {

    }
    .tbl_simpanan tr td{
        /*padding: 1em;*/
        font-weight: bold;
    }

    .penyimpanan-top {
        display: flex;
        justify-content: space-between;
        line-height: 1em;
    }

    .penyimpanan-title {

    }

    .penyimpanan-box {
        /*padding: 1em;*/
    }

    .penyimpanan-button {
        padding-top: 1em;
    }


</style>

<script type="text/javascript">
    function getTotalSimpanan () {

    }
</script>