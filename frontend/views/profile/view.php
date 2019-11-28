<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */

$this->title = $model->profile_id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view">    

    <p>
        <?= Html::a('Edit Profile', ['update', 'id' => $model->profile_id], ['class' => 'btn btn-primary ']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->profile_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [            
            'nama',
            'alamat',
            'tanggal_lahir',            
        ],
    ]) ?>

</div>
