<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\components\ToolsColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KoperasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Koperasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="koperasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Koperasi', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'koperasi_id',
            'name',
            'tanggal_berdiri',
            // 'tipe_koperasi_id',
            'alamat',
            //'deskripsi:ntext',
            //'kode_pos',
            //'provinsi',
            //'kabupaten',
            //'kecamatan',            
            [
                'label' => 'Status',
                'attribute' => 'status',
                'value' => function($data){ 
                    if ($data->status != 0) {
                        return "Aktif";
                    } else {
                        return "Belum Aktif";
                    }                    
                }
            ],

            ['class' => 'common\components\ToolsColumn',
                'template' => '{view} {approve}',
                'buttons' => [                    
                    'approve' => function ($url, $model){                        
                        return ToolsColumn::renderCustomButton($url, $model, 'Approve', 'glyphicon glyphicon-pencil');
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index){
                    if ($action === 'view') {
                        return Url::toRoute(['view', 'id' => $key]);
                    }else if ($action === 'approve') {
                        return Url::toRoute(['approve', 'id' => $key]);
                    }
                }
            ],
        ],
    ]); ?>

</div>
