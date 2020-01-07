<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CicilanPeminjaman */

$this->title = 'Update Cicilan Peminjaman: ' . $model->cicilan_peminjaman_id;
$this->params['breadcrumbs'][] = ['label' => 'Cicilan Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cicilan_peminjaman_id, 'url' => ['view', 'id' => $model->cicilan_peminjaman_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cicilan-peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
