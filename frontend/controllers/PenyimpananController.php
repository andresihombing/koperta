<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Penyimpanan;
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
        $model = new Penyimpanan();
        $petugas = Petugas::find()->where(['user_id' => Yii::$app->user->identity->id])->one(); 

        
        if ($model->load(Yii::$app->request->post()) ) {
            var_dump($model->tipe_penyimpanan_id);
        //     date_default_timezone_set("Asia/Jakarta");
        //     $model->koperasi_id = $_SESSION['koperasi_id'];
        //     $model->petugas_id = $petugas->petugas_id;
        //     $model->tgl_transaksi = date("Y-m-d H:i:s");

        //     $model->save();
        //     return $this->redirect(['view', 'id' => $model->penyimpanan_id]);
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            date_default_timezone_set("Asia/Jakarta");
            $model->tgl_transaksi = date("Y-m-d H:i:s");

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
