<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PenyimpananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penyimpanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyimpanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penyimpanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'penyimpanan_id',
            'koperasi_id',
            'anggota_id',
            'nilai_simpanan',
            'tgl_penyimpanan',
            //'petugas_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
