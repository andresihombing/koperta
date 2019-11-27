<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanKendaraan */

$this->title = 'Create Jaminan Kendaraan';
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Kendaraans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jaminan-kendaraan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
