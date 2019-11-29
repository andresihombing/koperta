<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anggota */

$this->title = 'Tambah Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-create">

    <center><h1><?= Html::encode($this->title) ?><hr style="width: 40%; background: #898e94; height: 5px; border-color : transparent;" /></center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
