<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
//use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keluar';
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
                        <div class="surat-keluar-index">

                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                            <p>
                                <?= Html::a('<i class="fa fa-plus"> </i> Create Surat Keluar', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>

                            <?php 
                            // echo $this->render('_search', ['model' => $searchModel]); 

                                $gridColumns = [
                                    'no_suratkeluar',
                                    'tgl_keluar',
                                    'tujuan',
                                    'isi:ntext',
                                    //'id_jenis_surat',
                                ];

                                echo ExportMenu::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => $gridColumns,
                                ]);
                            ?>
                    
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'no_suratkeluar',
                                    'tgl_keluar',
                                    'tujuan',
                                    'isi:ntext',
                                    //'id_jenis_surat',

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>