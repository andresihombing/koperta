<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomSimpanPinjam */

$this->title = 'Create Custom Simpan Pinjam';
$this->params['breadcrumbs'][] = ['label' => 'Custom Simpan Pinjams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-simpan-pinjam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
