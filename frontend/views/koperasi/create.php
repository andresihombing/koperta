<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Koperasi */

$this->title = 'Daftarkan Koperasi Anda';
$this->params['breadcrumbs'][] = ['label' => 'Koperasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="koperasi-create">
	<div class="container">
	    <h1 class="text-center"><?= Html::encode($this->title) ?></h1><hr style="width: 40%; background: #898e94; height: 5px; border-color : transparent;" />

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
    </div>

</div>
