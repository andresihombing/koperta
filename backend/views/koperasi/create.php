<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Koperasi */

$this->title = 'Create Koperasi';
$this->params['breadcrumbs'][] = ['label' => 'Koperasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="koperasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
