<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\ToolsColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anggota Koperasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Anggota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'dob',
            'no_ktp',

            ['class' => 'common\components\ToolsColumn',
                'template' => '{view}{update}{delete}',
                'header' => 'Aksi',
                'buttons' => [
                    'view' => function($url, $model){
                        return ToolsColumn::renderCustomButton($url, $model, 'View', 'fa fa-eye');
                    },
                    'update' => function($url, $model){
                            return ToolsColumn::renderCustomButton($url, $model, 'Update', 'fa fa-edit');

                    },
                    'delete' => function($url, $model){
                        return ToolsColumn::renderCustomButton($url, $model, 'Delete', 'fa fa-edit');
                        
                },
                ],
            ],
        ],
    ]); ?>


</div>
