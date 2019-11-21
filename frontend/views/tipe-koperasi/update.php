<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TipeKoperasi */

$this->title = 'Update Tipe Koperasi: ' . $model->tipe_koperasi_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Koperasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipe_koperasi_id, 'url' => ['view', 'id' => $model->tipe_koperasi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipe-koperasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
