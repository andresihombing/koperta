<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Koperasi;
use frontend\models\search\KoperasiSearch;
use frontend\models\CustomSimpanPinjam;
use frontend\models\JaminanBangunan;
use frontend\models\JaminanKendaraan;
use frontend\models\Profile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KoperasiController implements the CRUD actions for Koperasi model.
 */
class KoperasiController extends Controller
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
     * Lists all Koperasi models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new KoperasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Koperasi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = "main-2";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDashboard($id)
    {
        $this->layout = "main-3";
        return $this->render('dashboard', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Koperasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "main-2";
        $model = new Koperasi();

        if ($model->load(Yii::$app->request->post())) {
            $profile = Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
            $model->save();
            
            $profile->koperasi_id = $model->koperasi_id;            
            $profile->save();

            //Kedepannya harus ada kondisi untuk tambah data sesuai tipe koperasi
            $customization = new CustomSimpanPinjam();
            $customization->tanah_bangunan = 0;
            $customization->jenis_kendaraan = 0;
            $customization->surat_keterangan = 0;
            $customization->koperasi_id = $model->koperasi_id;
            $customization->save();

            if(!isset($_SESSION['koperasi_id'])) $_SESSION['koperasi_id'] = $model->koperasi_id;
            return $this->redirect(['dashboard', 'id' => $model->koperasi_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Koperasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->koperasi_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Koperasi model.
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

    public function actionFitur($id)
    {
        $this->layout = 'main-3';
        
        $model = CustomSimpanPinjam::find()->where(['koperasi_id' => $id])->one();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/koperasi/dashboard', 'id' => $id]);
        }

        return $this->render('fitur', [
            'id' => $id,
            'model' => $model
        ]);
    }

    /**
     * Finds the Koperasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Koperasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Koperasi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
