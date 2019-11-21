<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="site-index home-bg">

    <div class="container" style="padding: 100px 0px;">
        <div class="jumbotron">
            <h1 style="color: #fff;">Koperta</h1>

            <p class="lead">Rasakan mengelola koperasi anda dengan mudah.</p>
            <?php if (Yii::$app->user->identity == null) { ?>
                <?= Html::a('Bergabung dengan kami', ['site/signup'], ['class' => 'btn btn-success']) ?>
            <?php } else { ?>
                <?= Html::a('Daftarkan Koperasi Anda', ['koperasi/create'], ['class' => 'btn btn-success']) ?>
            <?php } ?>
        </div>        
    </div>

</div>

<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="https://indonesiadevelopmentforum.com/uploads/original/2018/06/idf-1528695621.jpg" alt="" class="img-responsive">        
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p style="font-size: 18px;">Pemerintah tengah berupaya mendorong pemerataan ekonomi di seluruh wilayah Tanah Air dengan langkah yang dilakukan baik dari pemerintah pusat dan daerah. Mari kita tengok sedikit situasi hari ini. Pertama, kebijakan ekonomi dengan pola usaha individual, yang berorientasi pada kompetisi dan pengumpulan keuntungan oleh pemilik modal, telah melahirkan kesenjangan. Kedua, kesenjangan terlihat pada jumlah usaha di Indonesia secara keseluruhan 98,8 persen unit usaha adalah mikro, 1 persen usaha kecil, dan selebihnya 1 persen usaha menengah dan 0,01 persen usaha besar. Ketiga, kesenjangan juga tecermin dalam kepemilikan aset, 10 persen terkaya di Indonesia memiliki 77 persen aset dan 1 persen memiliki lebih dari 50 persen kekayaan negeri.</p>
        </div>    
    </div>

    <div class="row" style="padding: 50px 0px;">
        <center><h1 style="margin-bottom: 50px;"><b>Fitur yang kami tawarkan</b></h1></center>
        
        <div class="col-md-3">
            <center>
                <p class="fa fa-laptop" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Web Development</b><br>
                <p>Kembangkan bisnis anda secara tepat dengan konten yang sesuai dengan profil perusahaan anda.</p>
            </center>
        </div>
        
        <div class="col-md-3">
            <center style="margin-bottom: 10px;">
                <p class="fa fa-mobile-phone" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Mobile Apps</b><br>
                <p>Jangkau pelanggan dengan layanan bisnis anda langsung dari smartphone mereka.</p>
            </center>
        </div>
        
        <div class="col-md-3">
            <center style="margin-bottom: 10px;">
                <p class="fa fa-gears" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Optimization</b><br>
                <p>Optimalkan pemasaran produk anda dengan teknologi dan pengalaman kami hingga jangkauan yang tidak terbayangkan oleh anda.</p>
            </center>
        </div>
        
        <div class="col-md-3">
            <center style="margin-bottom: 10px;">
                <p class="fa fa-desktop" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">hardware</b><br>
                <p>Kami menyediakan layanan pengadaan hardware untuk keutuhan bisnis anda dengan harga yang kompetitif dengan dukungan rekanan kami.    </p>
            </center>
        </div>

    </div>

</div>
