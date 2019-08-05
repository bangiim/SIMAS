<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $checkpass = $model->password;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $pass = md5($model->password);
            $model->password = $pass;
            $model->user_image= UploadedFile::getInstance($model,'user_image');

            if ($model->user_image!=null) {    
                $foto = $model->id.'-'.$model->username;
                $model->user_image->saveAs('repositori/images/'.$foto.'.'.$model->user_image->extension); 
                //save the path in the db column
                $model->user_image = 'repositori/images/'.$foto.'.'.$model->user_image->extension;
                $model->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else{
            return $this->render('create', [
            'model' => $model,
            ]);
        }

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->password == $checkpass) {
                
            }
            else {
                $pass = md5($model->password);
                $model->password = $pass;
            }
            if ($model->save()){
                //$this->redirect(array('index'));
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $checkpass = $model->password;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $pass = md5($model->password);
            $model->password = $pass;
            $model->user_image= UploadedFile::getInstance($model,'user_image');

            if ($model->user_image!=null) {    
                $foto = $model->id.'-'.$model->username;
                $model->user_image->saveAs('repositori/images/'.$foto.'.'.$model->user_image->extension); 
                //save the path in the db column
                $model->user_image = 'repositori/images/'.$foto.'.'.$model->user_image->extension;
                $model->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else{
            return $this->render('create', [
            'model' => $model,
            ]);
        }

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->password == $checkpass) {
                
            }
            else {
                $pass = md5($model->password);
                $model->password = $pass;
            }
            if ($model->save()){
                //$this->redirect(array('index'));
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);*/
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (!empty($model->user_image)) {
            unlink($model->user_image);
            $this->findModel($id)->delete();
        }
        else{
            $this->findModel($id)->delete();
        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
