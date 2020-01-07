<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\CicilanPeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cicilan Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cicilan-peminjaman-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Buat Cicilan Peminjaman', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'cicilan_peminjaman_id',
            // 'peminjaman_id',

            'tanggal_transaksi',
            'angsuran_ke',
            'keterangan',
            [
                'attribute' => 'mutasi_pokok',
                'label' => 'Mutasi Pokok',
                'value' => function($model){
                    return 'Rp. '.$model->mutasi_pokok;
                }
            ],
            [
                'attribute' => 'mutasi_bunga',
                'label' => 'Mutasi Bunga',
                'value' => function($model){
                    return 'Rp. '.$model->mutasi_bunga;
                }
            ],
            [
                'attribute' => 'jumlah_angsuran',
                'label' => 'Jumlah Angsuran',
                'value' => function($model){
                    return 'Rp. '.$model->jumlah_angsuran;
                }
            ],
            [
                'attribute' => 'saldo_akhir',
                'label' => 'Saldo Akhir',
                'value' => function($model){
                    return 'Rp. '.$model->saldo_akhir;
                }
            ],
            // 'mutasi_pokok',
            // 'mutasi_bunga',
            // 'jumlah_angsuran',
            // 'saldo_akhir',

            //'class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
