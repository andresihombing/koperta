<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanKendaraan */

$this->title = 'Update Jaminan Kendaraan: ' . $model->jaminan_kendaraan_id;
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Kendaraans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jaminan_kendaraan_id, 'url' => ['view', 'id' => $model->jaminan_kendaraan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jaminan-kendaraan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
