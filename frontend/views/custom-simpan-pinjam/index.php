<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\CustomSimpanPinjamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custom Simpan Pinjams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-simpan-pinjam-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Custom Simpan Pinjam', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'simpan_pinjam_id',
            'tanah_bangunan',
            'jenis_kendaraan',
            'surat_keterangan',
            'koperasi_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
