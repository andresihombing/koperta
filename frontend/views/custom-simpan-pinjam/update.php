<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomSimpanPinjam */

$this->title = 'Update Custom Simpan Pinjam: ' . $model->simpan_pinjam_id;
$this->params['breadcrumbs'][] = ['label' => 'Custom Simpan Pinjams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->simpan_pinjam_id, 'url' => ['view', 'id' => $model->simpan_pinjam_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custom-simpan-pinjam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
