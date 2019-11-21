<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\KoperasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Koperasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="koperasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Koperasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'koperasi_id',
            'name',
            'tanggal_berdiri',
            'tipe_koperasi_id',
            'alamat',
            //'deskripsi:ntext',
            //'kode_pos',
            //'provinsi',
            //'kabupaten',
            //'kecamatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
