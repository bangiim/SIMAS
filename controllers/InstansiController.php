<?php

namespace app\controllers;

use Yii;
use app\models\Instansi;
use app\models\InstansiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
 
/**
 * InstansiController implements the CRUD actions for Instansi model.
 */
class InstansiController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Instansi models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new InstansiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/

        $db = yii::$app->db;
        $model = $db->createCommand('SELECT * FROM instansi WHERE id_instansi=1')->queryOne();
        return $this->render('view', [
            'model' => $this->findModel($model)]);
    }

    /**
     * Displays a single Instansi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        Yii::setAlias('@imageurl', 'http://localhost/simas/repositori/images');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function getImageurl()
    {
      return \Yii::getAlias('@imageurl').'/'.$this->logo;
    }

    /**
     * Creates a new Instansi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Instansi();

        if ($model->load(Yii::$app->request->post())) {

            $imageName = $model->nama_instansi;
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs('repositori/images/'.$imageName.'.'.$model->file->extension);

            //save the path in the db column
            $model->logo = 'repositori/images/'.$imageName.'.'.$model->file->extension;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id_instansi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Instansi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->logo= UploadedFile::getInstance($model,'logo');
            $model->kopsurat= UploadedFile::getInstance($model,'kopsurat');

            if ($model->logo!=null OR $model->kopsurat!=null) { 
                $logoName = 'Logo'.'-'.$model->nama_instansi;
                $kopsuratName = 'Kop'.'-'.$model->nama_instansi;

                $model->logo->saveAs('repositori/images/'.$logoName.'.'.$model->logo->extension);
                $model->kopsurat->saveAs('repositori/images/'.$kopsuratName.'.'.$model->kopsurat->extension);
               
                //save the path in the db column
                $model->logo = 'repositori/images/'.$logoName.'.'.$model->logo->extension;
                $model->kopsurat = 'repositori/images/'.$kopsuratName.'.'.$model->kopsurat->extension;
                $model->save();
            }
            elseif ($model->logo==null OR $model->kopsurat==null) {
                //print_r($model->attributes);
                
                $model->save();
            }
            else{
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id_instansi]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Instansi model.
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
     * Finds the Instansi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instansi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Instansi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
