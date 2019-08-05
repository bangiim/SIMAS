<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SuratMasukSearch;
use app\models\SuratKeluarSearch;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!YII::$app->user->isGuest) {

            #Get the data from new model in here
            $modelSuratMasuk = New SuratMasukSearch();
            $modelSuratKeluar = New SuratKeluarSearch();

            $dataProvider  = $modelSuratMasuk->count_some();
            $dataProvider2 = $modelSuratKeluar->count_some();

            $arr_tampil = array(
                'jumlah_surat_masuk' => $dataProvider,
                'jumlah_surat_keluar' => $dataProvider2
            );

            return $this->render('index',$arr_tampil);
        }
        else{
            $this->redirect(['site/login']);
        } 
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } 
        else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {


        Yii::$app->user->logout();
        return $this->goHome();
        //return $this->redirect(Yii::$app->user->loginUrl);*/
    }
    
    
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='login')
                 $this->layout = 'login';
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Displays contact page. 
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
