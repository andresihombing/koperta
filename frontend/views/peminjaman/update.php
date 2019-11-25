<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */

$this->title = 'Update Peminjaman: ' . $model->peminjaman_id;
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->peminjaman_id, 'url' => ['view', 'id' => $model->peminjaman_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>