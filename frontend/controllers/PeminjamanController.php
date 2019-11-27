<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Peminjaman;
use frontend\models\search\PeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\JaminanKendaraan;
use frontend\models\JaminanTanahBangunan;

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

        if ($model->load(Yii::$app->request->post())) {
            $model->koperasi_id = $_SESSION['koperasi_id'];

            $jaminanKendaraan = new JaminanKendaraan();
            $jaminanKendaraan->nama_pemilik = $model->nama_pemilik_kendaraan;
            $jaminanKendaraan->no_polisi = $model->nama_pemilik_kendaraan;
            $jaminanKendaraan->merk = $model->merk_kendaraan;
            $jaminanKendaraan->tahun_pembuatan = $model->tahun_pembuatan_kendaraan;
            $jaminanKendaraan->warna = $model->warna_kendaraan;
            $jaminanKendaraan->nilai_harga = $model->nilai_harga_kendaraan;
            $jaminanKendaraan->save(false);

            $jaminanTanahBangunan = new JaminanTanahBangunan();
            $jaminanTanahBangunan->nama_pemilik = $model->nama_pemilik_bangunan;
            $jaminanTanahBangunan->no = $model->no_bangunan;
            $jaminanTanahBangunan->status_hak_milik = $model->status_hak_milik_bangunan;
            $jaminanTanahBangunan->luas = $model->luas_bangunan;
            $jaminanTanahBangunan->save(false);

            // echo $jaminanKendaraan->jaminan_kendaraan_id;die();
            // echo '<pre>'; print_r($jaminanTanahBangunan);die();

            $model->jaminan_tanah_bangunan_id = $jaminanTanahBangunan->jaminan_tanah_bangunan_id;
            $model->jaminan_kendaraan_id = $jaminanKendaraan->jaminan_kendaraan_id;
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->peminjaman_id]);
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
