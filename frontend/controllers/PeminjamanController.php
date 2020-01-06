<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Peminjaman;
use frontend\models\CustomSimpanPinjam;
use frontend\models\search\PeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\JaminanKendaraan;
use frontend\models\JaminanBangunan;
use frontend\models\JaminanTanah;

/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Peminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main-3';
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peminjaman model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'main-3';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'main-3';
        $model = new Peminjaman();
        $jaminan = CustomSimpanPinjam::find()->where(['koperasi_id' => $_SESSION['koperasi_id']])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->koperasi_id = $_SESSION['koperasi_id'];

            if($model->nama_pemilik_kendaraan != null) {
                $jaminanKendaraan = new JaminanKendaraan();
                $jaminanKendaraan->nama_pemilik = $model->nama_pemilik_kendaraan;
                $jaminanKendaraan->no_polisi = $model->no_polisi_kendaraan;
                $jaminanKendaraan->merk = $model->merk_kendaraan;
                $jaminanKendaraan->tahun_pembuatan = $model->tahun_pembuatan_kendaraan;
                $jaminanKendaraan->warna = $model->warna_kendaraan;
                $jaminanKendaraan->nilai_harga = $model->nilai_harga_kendaraan;
                $jaminanKendaraan->save(false);

                $model->jaminan_kendaraan_id = $jaminanKendaraan->jaminan_kendaraan_id;
            }
            
            if($model->nama_pemilik_bangunan != null) {
                $jaminanTanahBangunan = new JaminanTanahBangunan();
                $jaminanTanahBangunan->nama_pemilik = $model->nama_pemilik_bangunan;
                $jaminanTanahBangunan->no = $model->no_bangunan;
                $jaminanTanahBangunan->status_hak_milik = $model->status_hak_milik_bangunan;
                $jaminanTanahBangunan->luas = $model->luas_bangunan;
                $jaminanTanahBangunan->save(false);

                $model->jaminan_tanah_bangunan_id = $jaminanTanahBangunan->jaminan_tanah_bangunan_id;
            }
            
            if($model->nama_pemilik_tanah != null) {
                $jaminanTanah = new JaminanTanah();
                $jaminanTanah->nama_pemilik = $model->nama_pemilik_tanah;
                $jaminanTanah->no = $model->no_tanah;
                $jaminanTanah->status_hak_milik = $model->status_hak_milik_tanah;
                $jaminanTanah->luas = $model->luas_tanah;
                $jaminanTanah->save(false);

                $model->jaminan_tanah_id = $jaminanTanah->jaminan_tanah_id;
            }

            if($model->tipe_angsuran == null){
                $model->tipe_angsuran = ($jaminan->mingguan == 1) ? "mingguan" : "bulanan";
            }
            
            $model->save();
            return $this->redirect(['index']);
        }   

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Peminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'main-3';
        $model = $this->findModel($id);        
        $jaminanKendaraan = JaminanKendaraan::find()->where(['jaminan_kendaraan_id' => $model->jaminan_kendaraan_id])->one();
        
        if($model->nama_pemilik_kendaraan != null) {
            $model->nama_pemilik_kendaraan = $jaminanKendaraan->nama_pemilik;
            $model->no_polisi_kendaraan = $jaminanKendaraan->no_polisi;
            $model->merk_kendaraan = $jaminanKendaraan->merk;
            $model->tahun_pembuatan_kendaraan = $jaminanKendaraan->tahun_pembuatan;
            $model->warna_kendaraan = $jaminanKendaraan->warna;
            $model->nilai_harga_kendaraan = $jaminanKendaraan->nilai_harga;
        }

        if($model->nama_pemilik_bangunan != null) {
            $jaminanBangunan = JaminanBangunan::find()->where(['jaminan_bangunan_id' => $model->jaminan_bangunan_id])->one();
            $model->nama_pemilik_bangunan = $jaminanBangunan->nama_pemilik;
            $model->no_bangunan = $jaminanBangunan->no;
            $model->status_hak_milik_bangunan = $jaminanBangunan->status_hak_milik;
            $model->luas_bangunan = $jaminanBangunan->luas;
        }

        if($model->nama_pemilik_tanah != null) {
            $jaminanTanah = JaminanTanah::find()->where(['jaminan_tanah_id' => $model->jaminan_tanah_id])->one();
            $model->nama_pemilik_tanah = $jaminanTanah->nama_pemilik;;
            $model->no_tanah = $jaminanTanah->no;
            $model->status_hak_milik_tanah = $jaminanTanah->status_hak_milik;
            $model->luas_tanah = $jaminanTanah->luas;
        }

        if ($model->load(Yii::$app->request->post())) {
            if($model->nama_pemilik_kendaraan != null) {
                $jaminanKendaraan->nama_pemilik = $model->nama_pemilik_kendaraan;
                $jaminanKendaraan->no_polisi = $model->no_polisi_kendaraan;
                $jaminanKendaraan->merk = $model->merk_kendaraan;
                $jaminanKendaraan->tahun_pembuatan = $model->tahun_pembuatan_kendaraan;
                $jaminanKendaraan->warna = $model->warna_kendaraan;
                $jaminanKendaraan->nilai_harga = $model->nilai_harga_kendaraan;
                $jaminanKendaraan->save(false);
            }

            if($model->nama_pemilik_bangunan != null) {
                $jaminanBangunan->nama_pemilik = $model->nama_pemilik_bangunan;
                $jaminanBangunan->no = $model->no_bangunan;
                $jaminanBangunan->status_hak_milik = $model->status_hak_milik_bangunan;
                $jaminanBangunan->luas = $model->luas_bangunan;
                $jaminanBangunan->save(false);
            }

            if($model->nama_pemilik_tanah != null) {
                $jaminanTanah->nama_pemilik = $model->nama_pemilik_tanah;
                $jaminanTanah->no = $model->no_tanah;
                $jaminanTanah->status_hak_milik = $model->status_hak_milik_tanah;
                $jaminanTanah->luas = $model->luas_tanah;
                $jaminanTanah->save(false);
            }

            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Peminjaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peminjaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
