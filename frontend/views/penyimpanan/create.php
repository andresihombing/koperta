<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Penyimpanan */

$this->title = 'Create Penyimpanan';
$this->params['breadcrumbs'][] = ['label' => 'Penyimpanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penyimpanan">

    <div class="penyimpanan-space-between">
        <div>
            <?= Html::a('Kembali', ['/penyimpanan/index'], ['class' => 'back-button btn btn-primary']) ?>
        </div>

        <div> 
            <h3 style="line-height: 0">Tambah Transaksi Baru</h3>
        </div>
    </div>

    <div class="box box-success penyimpanan-create">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
