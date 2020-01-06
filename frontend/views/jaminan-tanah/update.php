<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanTanah */

$this->title = 'Update Jaminan Tanah: ' . $model->jaminan_bangunan_id;
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Tanahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jaminan_bangunan_id, 'url' => ['view', 'id' => $model->jaminan_bangunan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jaminan-tanah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
