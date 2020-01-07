<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CicilanPeminjaman;
use frontend\models\Peminjaman;
use frontend\models\search\CicilanPeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CicilanPeminjamanController implements the CRUD actions for CicilanPeminjaman model.
 */
class CicilanPeminjamanController extends Controller
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
     * Lists all CicilanPeminjaman models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $this->layout = 'main-3';
        $modelPeminjaman = CicilanPeminjaman::find()->where(['peminjaman_id' => $id])->all();
        $searchModel = new CicilanPeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelPeminjaman' => $modelPeminjaman,
            'id' => $id
        ]);
    }

    /**
     * Displays a single CicilanPeminjaman model.
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
     * Creates a new CicilanPeminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = 'main-3';
        $modelPeminjaman = Peminjaman::find()->where(['peminjaman_id' => $id])->one();        
        $model = new CicilanPeminjaman();        
        date_default_timezone_set("Asia/Jakarta");


        if ($model->load(Yii::$app->request->post())) {
            $angsuran = CicilanPeminjaman::find()->where(['peminjaman_id' => $id])->limit(1)->one();            
            $model->peminjaman_id = $id;            
            $model->tanggal_transaksi = date("d/m/Y");
            $model->jumlah_angsuran = $modelPeminjaman->angsuran_kredit;
            $bunga = $modelPeminjaman->nilai_permohonan * 0.02;
            $pokok = $modelPeminjaman->angsuran_kredit - $bunga;
            $model->mutasi_pokok = $pokok;
            $model->mutasi_bunga = $bunga;
            $model->saldo_akhir = 0;
            if ($angsuran == null) {
                $model->angsuran_ke = 1;    
            }else{
                $model->angsuran_ke = $angsuran->angsuran_ke + 1;
            }            
            $model->save(false);
            $cicilan = CicilanPeminjaman::find()->where(['peminjaman_id' => $id])->sum('mutasi_pokok');            
            $akhir = $modelPeminjaman->total_angsuran - $cicilan;
            $model->saldo_akhir = $akhir;
            $model->save(false);
            return $this->redirect(['index', 'id' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CicilanPeminjaman model.
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
            return $this->redirect(['view', 'id' => $model->cicilan_peminjaman_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CicilanPeminjaman model.
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
     * Finds the CicilanPeminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CicilanPeminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CicilanPeminjaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
