<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Koperasi */

$this->title = 'Update Koperasi: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Koperasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->koperasi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="koperasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
