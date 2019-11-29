<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */

$this->title = 'Edit Peminjaman ' . $model->anggota->name;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->peminjaman_id, 'url' => ['view', 'id' => $model->peminjaman_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peminjaman-update">

    <h2><?= Html::encode($this->title) ?></h2><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
