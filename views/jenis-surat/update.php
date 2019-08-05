<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisSurat */

$this->title = 'Update Jenis Surat: ' . $model->id_jenis_surat;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Surats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_surat, 'url' => ['view', 'id' => $model->id_jenis_surat]];
$this->params['breadcrumbs'][] = 'Update';
?>
	<div class="row wrapper border-bottom white-bg page-heading">
	    <div class="col-lg-10">
	        <h2><?= Html::encode($this->title) ?></h2>
	        <ol class="breadcrumb">
	            <li>
                    <a href="index.php?r=site/index">Home</a>
                </li>
                <li>
                    <a href="index.php?r=jenis-surat/index">Forms</a>
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
	                    <div class="jenis-surat-update">

						    <?= $this->render('_form', [
						        'model' => $model,
						    ]) ?>

						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

