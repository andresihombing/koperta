<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Anggota */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anggota-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <div class="tab" style="margin-top: 0px;">
        <button class="btn" onclick="openContent(event, 'data')" id="defaultOpen"><b>Data Anggota</b> &nbsp;&nbsp; </button>
        <button class="btn" onclick="openContent(event, 'pinjam')"><b>Peminjaman</b> &nbsp;&nbsp;&nbsp; </button>
        <button class="btn" onclick="openContent(event, 'simpan')"><b>Penyimpanan</b> &nbsp;&nbsp;&nbsp; </button>
    </div>

    <div id="data" class="tabcontent">
        <br>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'anggota_id',
                // 'koperasi_id',
                'name',
                'dob',
                'no_ktp',
                'alamat_lengkap',
                'status',
                'perkawinan_ke',
                'jumlah_anak',
                [
                    'label'  => 'File KK',
                    'value'  => function ($model) {
                        $test = '<font id="myImg"><a>'.$model->kk.'</a></font>
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01" src="uploads/'.$model->kk.'" alt="Snow" style="width:100%;max-width:300px">
                            <div id="caption">'.$model->name.'</div>
                        </div>';
                        return $test;
                    },
                    'format' => 'raw',
                ],
                [
                    'label'  => 'File KTP',
                    'value'  => function ($model) {
                        $test = '<font id="myImg2"><a>'.$model->ktp.'</a></font>
                        <div id="myModal2" class="modal">
                            <span class="close2">&times;</span>
                            <img class="modal-content" id="img02" src="uploads/'.$model->ktp.'" alt="Snow" style="width:100%;max-width:300px">
                            <div id="caption">'.$model->name.'</div>
                        </div>';
                        return $test;
                    },
                    'format' => 'raw',
                ],
            ],
        ]) ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->anggota_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->anggota_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div id="pinjam" class="tabcontent">
        b
    </div>
    <div id="simpan" class="tabcontent">
        c
    </div>

</div>


<?php
     $this->registerJs('
    function openContent(evt, contentName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(contentName).style.display = "block";
    evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    // MODAL

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    img.onclick = function(){
    modal.style.display = "block";
    }

    // Get the modal 2
    var modal2 = document.getElementById("myModal2");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img2 = document.getElementById("myImg2");
    var modalImg = document.getElementById("img02");
    img2.onclick = function(){
    modal2.style.display = "block";
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the <span> element that closes the modal
    var span2 = document.getElementsByClassName("close2")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }

    // When the user clicks on <span> (x), close the modal
    span2.onclick = function() { 
    modal2.style.display = "none";
    }
 ', $this::POS_END);

    

    $this->registerCss("
        body {font-family: Arial, Helvetica, sans-serif;}

        #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 45px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        .close2 {
        position: absolute;
        top: 45px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close2:hover,
        .close2:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }"
    );
?>

