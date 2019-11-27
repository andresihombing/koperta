<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanTanahBangunan */

$this->title = 'Create Jaminan Tanah Bangunan';
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Tanah Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jaminan-tanah-bangunan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
