<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Anggota;
use common\models\User;
use frontend\models\search\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
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
     * Lists all Anggota models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $this->layout = "main-3";
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anggota model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        $this->layout = "main-3";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $this->layout = "main-3";
        $model = new Anggota();
        if ($model->load(Yii::$app->request->post())) {
            $arrUsername = explode(' ',trim($model->name));
            // $username = strtolower($arrUsername[0]) .''. str_replace('-', '', $model->dob) .''. generateRandomString();
            $username = strtolower($arrUsername[0]) .''. $this->generateRandomString();

            $user = new User();
            $user->username = $username;
            $user->email = $model->email;
            $user->status = 9;
            $user->setPassword($username);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save();


            $model->kk = UploadedFile::getInstance($model, 'kk');
            $model->ktp = UploadedFile::getInstance($model, 'ktp');

            if ($model->ktp && $model->kk) {
                $model->ktp->saveAs('uploads/anggota/' . $model->ktp->baseName . '.' . $model->ktp->extension);
                $model->kk->saveAs('uploads/anggota/' . $model->kk->baseName . '.' . $model->kk->extension);
            }

            $model->user_id = $user->id;
            $dob = explode('-', $model->dob);
            $model->dob = $dob[2].'-'.$dob[1].'-'.$dob[0];
            $model->save(false);

            // $model->save();
            
            return $this->redirect(['view', 'id' => $model->anggota_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {   
        $this->layout = "main-3";
        $model = $this->findModel($id);

        $modelUser = User::find()->where(['id' => $model->user_id])->one();
        $currentEmail = $modelUser->email;
        $model->email = $currentEmail;
        
        $currentKK = $model->kk;
        $currentKTP = $model->ktp;

        if ($model->load(Yii::$app->request->post())) {

            $model->kk = UploadedFile::getInstance($model, 'kk');
            $model->ktp = UploadedFile::getInstance($model, 'ktp');

            if ($model->ktp && $model->kk) {
                $model->ktp->saveAs('uploads/anggota/' . $model->ktp->baseName . '.' . $model->ktp->extension);
                $model->kk->saveAs('uploads/anggota/' . $model->kk->baseName . '.' . $model->kk->extension);
                echo "Save File<br>";
            }

            //update ktp
            if($model->ktp == ""){
                $model->ktp = $currentKTP;
            }

            //update kk
            if($model->kk == ""){
                $model->kk = $currentKK;
            }

            //update email
            if($currentEmail != $model->email){
                $modelUser->email = $model->email;
                $modelUser->save(false);
            }
            //save model
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->anggota_id]);
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Anggota model.
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
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}