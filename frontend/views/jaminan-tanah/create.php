<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JaminanTanah */

$this->title = 'Create Jaminan Tanah';
$this->params['breadcrumbs'][] = ['label' => 'Jaminan Tanahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jaminan-tanah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
