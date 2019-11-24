<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\JaminanKendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jaminan Kendaraans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jaminan-kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jaminan Kendaraan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jaminan_kendaraan_id',
            'nama_pemilik',
            'no_polisi',
            'merk',
            'tahun_pembuatan',
            //'warna',
            //'nilai_harga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
