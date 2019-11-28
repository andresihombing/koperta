<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peminjamen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'peminjaman_id',
            'anggota_id',
            'koperasi_id',
            'tujuan_kredit:ntext',
            'nilai_permohonan',
            //'angsuran_kredit',
            //'total_angsuran',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
