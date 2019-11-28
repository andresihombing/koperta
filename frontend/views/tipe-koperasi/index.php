<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\TipeKoperasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipe Koperasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-koperasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipe Koperasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tipe_koperasi_id',
            'tipe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
