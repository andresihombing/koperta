<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Penyimpanan;
use frontend\models\PenyimpananSaldo;
use frontend\models\search\PenyimpananSearch;
use frontend\models\Petugas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenyimpananController implements the CRUD actions for Penyimpanan model.
 */
class PenyimpananController extends Controller
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
     * Lists all Penyimpanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main-3';
        $searchModel = new PenyimpananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penyimpanan model.
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
     * Creates a new Penyimpanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'main-3';
        $model = new Penyimpanan();
        $modelPenyimpananSaldo = new PenyimpananSaldo();
        $petugas = Petugas::find()->where(['user_id' => Yii::$app->user->identity->id])->one(); 

        if ($model->load(Yii::$app->request->post()) ) {

            $penyimpananSaldo = PenyimpananSaldo::find()->where(['anggota_id' => $model->anggota_id])->one();
            if($penyimpananSaldo == null){
                if($model->tipe_penyimpanan_id == "1"){
                    $modelPenyimpananSaldo->anggota_id = $model->anggota_id;
                    $modelPenyimpananSaldo->total_saldo = $model->nilai_transaksi;
                    $modelPenyimpananSaldo->save();
                }else{
                    Yii::$app->session->setFlash('error', 'Saldo tidak mencukupi');
                    return $this->refresh();
                }
            }else{
                if($model->tipe_penyimpanan_id == "1"){
                    $penyimpananSaldo->total_saldo = $penyimpananSaldo->total_saldo + $model->nilai_transaksi;
                    $penyimpananSaldo->save();
                }elseif($model->tipe_penyimpanan_id == "2" && $penyimpananSaldo->total_saldo > $model->nilai_transaksi){
                    $penyimpananSaldo->total_saldo = $penyimpananSaldo->total_saldo - $model->nilai_transaksi;
                    $penyimpananSaldo->save();
                }elseif($model->tipe_penyimpanan_id == "2" && $penyimpananSaldo->total_saldo < $model->nilai_transaksi){
                    Yii::$app->session->setFlash('error', 'Saldo tidak mencukupi');
                    return $this->refresh();
                }
            }

            date_default_timezone_set("Asia/Jakarta");
            $model->koperasi_id = $_SESSION['koperasi_id'];
            $model->petugas_id = $petugas->petugas_id;
            $model->tgl_transaksi = date("Y-m-d H:i:s");

            $model->save();
            return $this->redirect(['view', 'id' => $model->penyimpanan_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Penyimpanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'main-3';
        $model = $this->findModel($id);
        $nilaiCurrent = $model->nilai_transaksi;

        $petugas = Petugas::find()->where(['user_id' => Yii::$app->user->identity->id])->one();

        if ($model->load(Yii::$app->request->post()) ) {
            $penyimpananSaldo = PenyimpananSaldo::find()->where(['anggota_id' => $model->anggota_id])->one();

            if($model->tipe_penyimpanan_id == "1"){
                // if($model->nilai_transaksi > $nilaiCurrent){
                    $penyimpananSaldo->total_saldo = $penyimpananSaldo->total_saldo + ($model->nilai_transaksi - $nilaiCurrent);
                // }else{
                    // $penyimpananSaldo->total_saldo = $penyimpananSaldo->total_saldo + ($model->nilai_transaksi - $nilaiCurrent);
                // }
                $penyimpananSaldo->save();
            }elseif($model->tipe_penyimpanan_id == "2" && $penyimpananSaldo->total_saldo > ($model->nilai_transaksi - $nilaiCurrent)){
                $penyimpananSaldo->total_saldo = $penyimpananSaldo->total_saldo - ($model->nilai_transaksi - $nilaiCurrent);
                $penyimpananSaldo->save();
            }elseif($model->tipe_penyimpanan_id == "2" && $penyimpananSaldo->total_saldo < ($model->nilai_transaksi - $nilaiCurrent)){
                Yii::$app->session->setFlash('error', 'Saldo tidak mencukupi');
                return $this->refresh();
            }

            date_default_timezone_set("Asia/Jakarta");
            $model->tgl_transaksi = date("Y-m-d H:i:s");
            $model->petugas_id = $petugas->petugas_id;

            $model->save();
            return $this->redirect(['view', 'id' => $model->penyimpanan_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Penyimpanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        echo $id;die();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penyimpanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penyimpanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penyimpanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
