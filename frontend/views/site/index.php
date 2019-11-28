<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="site-index home-bg">
    <div class="container" style="padding: 100px 0px; ">
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
    <div class="row text-center">
        <h1 style="margin-bottom: 50px;"><b>Apa Itu Koperasi</b><hr style="width: 40%; background: #1a57a5; height: 5px; border-color : transparent;" /></h1>
        <p style="font-family:initial; margin-bottom: 30px; font-size: 18px;">Koperasi adalah suatu badan usaha (organisasi ekonomi) yang dimiliki dan dioperasikan oleh para anggotanya untuk memenuhi kepentingan bersama di bidang ekonomi.</p>
        <p style="font-family:initial; margin-bottom: 70px; font-size: 18px;">Tujuan pembentukan koperasi adalah untuk membantu meningkatkan kesejahteraan para anggotanya. Selengkapnya, berikut ini adalah beberapa tujuan koperasi tersebut:
            Untuk meningkatkan taraf hidup anggota koperasi dan masyarakat di sekitarnya.
            Untuk membantu kehidupan para anggota koperasi dalam hal ekonomi.
            Membantu pemerintah dalam mewujudkan masyarakat yang adil dan makmur.
            Koperasi berperan serta dalam membangun tatanan perekonomian nasional
        </p>
    </div>

    <div class="row text-center">
        <h1 style="margin-bottom: 50px;"><b>Prinsip Dasar Koperasi</b><hr style="width: 40%; background: #1a57a5; height: 5px; border-color : transparent;" /></h1>
        <p style="font-family:initial; margin-bottom: 30px; font-size: 18px;">Dalam kegiatan operasionalnya, seluruh koperasi di Indonesia menggunakan prinsip-prinsip berikut ini:
        Keanggotaan koperasi sifatnya terbuka dan sukarela.
        Proses pengelolaan koperasi harus dilakukan secara demokratis.
        Pembagian sisa hasil usaha (SHU) harus mengedapankan rasa keadilan sesuai dengan kinerja dari masing-masing anggota.
        Pemberian balas jasa kepada anggota disesuaikan dengan modal anggota tersebut.
        </p>
    </div>

    <div class="row" style="padding: 50px 0px;">
        <center><h1 style="margin-bottom: 50px;"><b>Keuntungan Yang Kami Tawarkan</b><hr style="width: 40%; background: #1a57a5; height: 5px; border-color : transparent;" /></h1></center>

        <div class="col-md-3">
            <center>
                <p class="fa fa-hand-peace-o" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Mudah</b><br>
                <p>Kembangkan bisnis anda secara tepat dengan konten yang sesuai dengan profil perusahaan anda.</p>
            </center>
        </div>

        <div class="col-md-3">
            <center style="margin-bottom: 10px;">
                <p class="fa fa-mobile-phone" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Fleksibel</b><br>
                <p>Jangkau pelanggan dengan layanan bisnis anda langsung dari smartphone mereka.</p>
            </center>
        </div>

        <div class="col-md-3">
            <center style="margin-bottom: 10px;">
                <p class="fa fa-handshake-o" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Bayar Sesuai Pemakaian</b><br>
                <p>Pembayaran dilakukan sesuai dengan Paket yang dipilih.</p>
            </center>
        </div>

        <div class="col-md-3">
            <center style="margin-bottom: 10px;">
                <p class="fa fa-gears" style="font-size:60px;"></p><br>
                <b style="margin-bottom: 10px;">Customisasi</b><br>
                <p>Customisasi Fitur Apklikasi Koperasi Anda dengan Mudah.</p>
            </center>
        </div>

    </div>





