<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\widget\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */

$this->title = 'No Surat Masuk : '.$model->no_suratmasuk;
$this->params['breadcrumbs'][] = ['label' => 'Surat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?= Html::encode($this->title) ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php?r=site/index">Home</a>
                </li>
                <li>
                    <a href="index.php?r=surat-masuk/index">Data Surat Masuk</a>
                </li>
                <li class="active">
                    <strong>Detail Data</strong>
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
                        <div class="surat-masuk-view">
                            <p>
                                <?= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $model->id_suratmasuk], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('<i class="fa fa-trash-o"></i> Delete', ['delete', 'id' => $model->id_suratmasuk], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </p>

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    //'id_suratmasuk',
                                    'no_suratmasuk',
                                    //'no_urut',
                                    'pengirim',
                                    'tgl_masuk',
                                    'perihal_surat',
                                    'upload_berkas',
                                    //'id_jenis_surat',
                                ],
                            ]) ?>
                            <?= Html::button('<i class="fa fa-eye"></i> Show Berkas', ['class' => 'btn btn-success btn-rounded','id'=>'modalButton']) ?>
                           
                            <?php
                                Modal::begin([
                                'header' => '<h4>File Surat Masuk</h4>',
                                'id' => 'modal',
                                'size' => 'modal-lg',
                                ]); 

                                echo "<p id='modalContent'><embed width='100%' height='600px' src='$model->upload_berkas' type='application/pdf'></embed></p>";
                                Modal::end()
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

