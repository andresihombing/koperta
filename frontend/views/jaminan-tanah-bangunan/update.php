<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanTanahBangunan */

$this->title = 'Update Jaminan Tanah Bangunan: ' . $model->jaminan_tanah_bangunan_id;
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Tanah Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jaminan_tanah_bangunan_id, 'url' => ['view', 'id' => $model->jaminan_tanah_bangunan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jaminan-tanah-bangunan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
