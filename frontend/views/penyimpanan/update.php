<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Penyimpanan */

$this->title = 'Update Penyimpanan: ';
$this->params['breadcrumbs'][] = ['label' => 'Penyimpanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->penyimpanan_id, 'url' => ['view', 'id' => $model->penyimpanan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penyimpanan">

    <div class="container">

    	<div class="penyimpanan-space-between">
            <div>
                <?= Html::a('Kembali', ['/penyimpanan/index'], ['class' => 'back-button btn btn-primary']) ?>
            </div>

            <div> 
                <h3 style="line-height: 0">Ubah Data Transaksi</h3>
            </div>
        </div>

		<div class="box box-success penyimpanan-create">

		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>

	</div>

</div>