<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\PenyimpananSaldo;

/* @var $this yii\web\View */
/* @var $model frontend\models\Penyimpanan */

$this->title = "Detail Peminjaman";
$this->params['breadcrumbs'][] = ['label' => 'Penyimpanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$saldoAnggota = PenyimpananSaldo::find()->where(['anggota_id' => $model->anggota_id])->one();

?>
<div class="penyimpanan">

    <div class="container">

        <div class="penyimpanan-space-between">
            <div>
                <?= Html::a('Kembali', ['/penyimpanan/index'], ['class' => 'back-button btn btn-primary']) ?>
            </div>

            <div> 
                <?= Html::a('Update', ['update', 'id' => $model->penyimpanan_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->penyimpanan_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?> 
            </div>
        </div>

        <div class="box box-primary penyimpanan-view">

            <h3><?= $model->anggota->name ?></h3>

            <table class="table table-bordered table-striped">
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><?= $model->tgl_transaksi ?></td>
                </tr>
                <tr>
                    <td>Jenis Transaksi</td>
                    <td><?= $model->tipePenyimpanan->name ?></td>
                </tr>
                <tr>
                    <td>Besar Transaksi</td>
                    <td><?= $model->nilai_transaksi ?></td>
                </tr>
                <tr>
                    <td>Petugas Koperasi</td>
                    <td><?= $model->petugas->name ?></td>
                </tr>
                <tr>
                    <td>Total Simpanan</td>
                    <td><?= $saldoAnggota->total_saldo ?></td>
                </tr>
            </table>

        </div>

    </div>

</div>
