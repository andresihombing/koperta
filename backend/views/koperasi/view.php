<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Koperasi */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Koperasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="koperasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->koperasi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->koperasi_id], [
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
            'koperasi_id',
            'name',
            'tanggal_berdiri',
            'tipe_koperasi_id',
            'alamat',
            'deskripsi:ntext',
            'kode_pos',
            'provinsi',
            'kabupaten',
            'kecamatan',
            'status',
        ],
    ]) ?>

</div>
