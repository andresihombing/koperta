<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\CustomSimpanPinjam;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */

$this->title = 'Peminjaman ' . $model->anggota->name;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$jaminan = CustomSimpanPinjam::find()->where(['koperasi_id' => $_SESSION['koperasi_id']])->one();
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

    <div class="col-md-6">
    <h4 class="text-center">Data Peminjaman</h4><hr>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'peminjaman_id',
                 [
                    'attribute' => 'anggota_id',
                    'label' => 'Nama Anggota',
                    'value' => function($model){
                        return $model->anggota->name;
                    }
                ],
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
    <div class="col-md-6">
        <?php if ($jaminan->jenis_kendaraan == 1) { ?>
            <h4 class="text-center">Jaminan Kendaraan</h4><hr>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'peminjaman_id',
                     [
                        'attribute' => 'nama_pemilik',
                        'label' => 'Nama Pemilik',
                        'value' => function($model){
                            return $model->jaminanKendaraan->nama_pemilik;
                        }
                    ],
                    [
                        'attribute' => 'no_polisi',
                        'label' => 'Nomor polisi',
                        'value' => function($model){
                            return $model->jaminanKendaraan->no_polisi;
                        }
                    ],
                    [
                        'attribute' => 'merk',
                        'label' => 'Merk',
                        'value' => function($model){
                            return $model->jaminanKendaraan->merk;
                        }
                    ],
                    [
                        'attribute' => 'tahun_pembuatan',
                        'label' => 'Tahun Pembuatan',
                        'value' => function($model){
                            return $model->jaminanKendaraan->tahun_pembuatan;
                        }
                    ],
                    [
                        'attribute' => 'warna',
                        'label' => 'Warna',
                        'value' => function($model){
                            return $model->jaminanKendaraan->warna;
                        }
                    ],
                    [
                        'attribute' => 'nilai_harga',
                        'label' => 'Nilai Harga',
                        'value' => function($model){
                            return $model->jaminanKendaraan->nilai_harga;
                        }
                    ],
                ],
            ]) ?>
        <?php } ?>

        <?php if ($jaminan->tanah_bangunan == 1) { ?>
            <h4 class="text-center">Jaminan Tanah Bangunan</h4><hr>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'peminjaman_id',
                     [
                        'attribute' => 'nama_pemilik',
                        'label' => 'Nama Pemilik',
                        'value' => function($model){
                            return $model->jaminanTanahBangunan->nama_pemilik;
                        }
                    ],
                    [
                        'attribute' => 'no',
                        'label' => 'Nomor',
                        'value' => function($model){
                            return $model->jaminanTanahBangunan->no;
                        }
                    ],
                    [
                        'attribute' => 'status_hak_milik',
                        'label' => 'Status Hak Milik',
                        'value' => function($model){
                            return $model->jaminanTanahBangunan->status_hak_milik;
                        }
                    ],
                    [
                        'attribute' => 'luas',
                        'label' => 'Tahun Pembuatan',
                        'value' => function($model){
                            return $model->jaminanTanahBangunan->luas;
                        }
                    ],
                ],
            ]) ?>
        <?php } ?>
    </div>
</div>
