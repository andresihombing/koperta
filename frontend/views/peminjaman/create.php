<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Peminjaman */

$this->title = 'Buat Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-create">

    <h2><?= Html::encode($this->title) ?></h2><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
