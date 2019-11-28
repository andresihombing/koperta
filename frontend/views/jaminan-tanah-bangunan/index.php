<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\JaminanTanahBangunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jaminan Tanah Bangunans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jaminan-tanah-bangunan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jaminan Tanah Bangunan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jaminan_tanah_bangunan_id',
            'nama_pemilik',
            'no',
            'status_hak_milik',
            'luas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
