<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */

$this->title = 'Peminjaman ' . $model->anggota->name;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peminjaman-view">

    <h2><?= Html::encode($this->title) ?></h2><hr>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->peminjaman_id], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->peminjaman_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'peminjaman_id',
            'anggota.name',
            'koperasi.name',
            'tujuan_kredit:ntext',
            'nilai_permohonan',
            'angsuran_kredit',
            'total_angsuran',
            'pekerjaan_utama',
            'pekerjaan_sampingan',
            'pendapatan_sampingan',
            'total_pendapatan_kotor',
            'biaya_lainnya',
            'biaya_pengeluaran',
            'pendapatan_bersih',
            // 'jaminan_tanah_bangunan_id',
            // 'jaminan_kendaraan_id',
            // 'jaminan_sk_id',
            'banyak_pinjaman',
            'plafon_terakhir',
            'tanggal_pelunasan',
        ],
    ]) ?>

</div>
