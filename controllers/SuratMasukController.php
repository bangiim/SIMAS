<?php

namespace app\controllers;

use Yii;
use app\models\SuratMasuk;
use app\models\SuratMasukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\controllers\ExcelExporter;

/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller
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
     * Lists all SuratMasuk models.
     * @return mixed
     */
    public function actionIndex()
    {   
        
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->with('surat_masuk');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratMasuk model.
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
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate( )
    {
        $model = new SuratMasuk();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->upload_berkas= UploadedFile::getInstance($model,'upload_berkas');

            if ($model->upload_berkas!=null) {    
                $arsip = $model->tgl_masuk.'-'.$model->pengirim.'-'.$model->perihal_surat;
                $model->upload_berkas->saveAs('repositori/SuratMasuk/'.$arsip.'.'.$model->upload_berkas->extension); 
                //save the path in the db column
                $model->upload_berkas = 'repositori/SuratMasuk/'.$arsip.'.'.$model->upload_berkas->extension;
                $model->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_suratmasuk]);
        } else{
            return $this->render('create', [
            'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->upload_berkas= UploadedFile::getInstance($model,'upload_berkas');

            if ($model->upload_berkas!=null) {
                $arsip = $model->tgl_masuk.'-'.$model->pengirim.'-'.$model->perihal_surat;
                $model->upload_berkas->saveAs('repositori/SuratMasuk/'.$arsip.'.'.$model->upload_berkas->extension); 
                //save the path in the db column
                $model->upload_berkas = 'repositori/SuratMasuk/'.$arsip.'.'.$model->upload_berkas->extension;
                $model->save();
            }
            $model->save();

            return $this->redirect(['view', 'id' => $model->id_suratmasuk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SuratMasuk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        unlink($model->upload_berkas);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratMasuk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportCsv()
    {
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->joinWith('surat_masuk')->asArray();
        $dataProvider->pagination = false;

        $i = 1;
        $rows = [];
        $rows[] = implode("\t", ['No Surat Masuk', 'Pengirim', 'Tanggal Masuk', 'Perihal Surat']); // header
        foreach ($dataProvider->query->all() as $row) {
            $r = [$i++];
            $r[] = $row['no_suratmasuk'];
            $r[] = $row['pengirim'];
            $r[] = $row['tgl_masuk'];
            $r[] = $row['perihal_surat'];
            $rows[] = implode("\t", $r);
        }
        return Yii::$app->getResponse()->sendContentAsFile(implode("\n", $rows), 'surat-masuk.csv', [
                'mimeType' => 'application/excel'
        ]);
    }
}
