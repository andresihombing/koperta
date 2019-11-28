<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanKendaraan */

$this->title = $model->jaminan_kendaraan_id;
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Kendaraans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jaminan-kendaraan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jaminan_kendaraan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jaminan_kendaraan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jaminan_kendaraan_id',
            'nama_pemilik',
            'no_polisi',
            'merk',
            'tahun_pembuatan',
            'warna',
            'nilai_harga',
        ],
    ]) ?>

</div>
