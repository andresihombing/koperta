<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\components\ToolsColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">    

    <p>
        <?= Html::a('Buat Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'peminjaman_id',
            [
                'attribute' => 'anggota_id',
                'label' => 'Nama Anggota',
                'value' => function($model){
                    return $model->anggota->name;
                }
            ],
            [
                'attribute' => 'koperasi_id',
                'label' => 'Nama Koperasi',
                'value' => function($model){
                    return $model->koperasi->name;
                },
            ],
            // 'tujuan_kredit:ntext',
            'nilai_permohonan',
            'angsuran_kredit',
            'total_angsuran',
            //'pekerjaan_utama',
            //'pekerjaan_sampingan',
            //'pendapatan_sampingan',
            //'total_pendapatan_kotor',
            //'biaya_lainnya',
            //'biaya_pengeluaran',
            //'pendapatan_bersih',
            //'jaminan_tanah_bangunan_id',
            //'jaminan_kendaraan_id',
            //'jaminan_sk_id',
            //'banyak_pinjaman',
            //'plafon_terakhir',
            //'tanggal_pelunasan',

            ['class' => 'common\components\ToolsColumn',
                'template' => '{view} {approve} {edit}',
                // 'buttons' => [                    
                //     'approve' => function ($url, $model){                        
                //         return ToolsColumn::renderCustomButton($url, $model, 'Approve', 'glyphicon glyphicon-pencil');
                //     }
                // ],
                'urlCreator' => function ($action, $model, $key, $index){
                    if ($action === 'view') {
                        return Url::toRoute(['view', 'id' => $key]);
                    }else if ($action === 'edit') {
                        return Url::toRoute(['update', 'id' => $key]);
                    }
                }
            ],
        ],
    ]); ?>


</div>
