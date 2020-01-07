<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CicilanPeminjaman */

$this->title = $model->cicilan_peminjaman_id;
$this->params['breadcrumbs'][] = ['label' => 'Cicilan Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cicilan-peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cicilan_peminjaman_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cicilan_peminjaman_id], [
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
            'cicilan_peminjaman_id',
            'peminjaman_id',
            'tanggal_transaksi',
            'angsuran_ke',
            'keterangan',
            'mutasi_pokok',
            'mutasi_bunga',
            'jumlah_angsuran',
            'saldo_akhir',
        ],
    ]) ?>

</div>
