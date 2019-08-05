<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\SuratMasuk;
use yii\helpers\ArrayHelper;

/*use kartik\export\ExportMenu;
use kartik\editable\Editable;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;*/


/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?= Html::encode($this->title) ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php?r=site/index">Home</a>
                </li>
                <li class="active">
                    <strong><?= Html::encode($this->title) ?></strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?= Html::encode($this->title) ?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                       <div class="surat-masuk-index">

                            <p>
                                <?= Html::a('<i class="fa fa-plus"> </i> Create Surat Masuk', ['create'], ['class' => 'btn btn-success']) ?>

                                <?php
                                $url = array_filter(Yii::$app->getRequest()->get());
                                $url[0] = 'export-csv';
                                unset($url['page']);
                                echo Html::a('<i class="fa fa-download"> </i> Export To csv', $url, [
                                    'class' => 'btn btn-primary', 'target' => '_blank'])
                                ?>
                            </p>

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                      
                                        'no_suratmasuk',
                                        //'no_urut',
                                        'pengirim',
                                        'tgl_masuk',
                                        'perihal_surat',
                                        //'upload_berkas',
                                        //'id_jenis_surat',
                                        
                                    ['class' => 'yii\grid\ActionColumn'],
                                ]
                            ]);
                            ?>

                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>