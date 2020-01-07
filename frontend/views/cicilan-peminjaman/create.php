<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CicilanPeminjaman */

$this->title = 'Create Cicilan Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Cicilan Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cicilan-peminjaman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
