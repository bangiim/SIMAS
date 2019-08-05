<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Instansi */

$this->title = 'Manajemen Instansi';
$this->params['breadcrumbs'][] = ['label' => 'Instansis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2><?= Html::encode($this->title) ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php?r=site/index">Home</a>
                </li>
                <li>
                    <a href="index.php?r=instansi/index">Forms</a>
                </li>
                <li class="active">
                    <strong><?= Html::encode($this->title) ?></strong>
                </li>
            </ol>
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
                        <div class="instansi-view">

                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'nama_instansi',
                                    'alamat:ntext',
                                    'website',      
                                    'nama_yayasan',
                                    'kepala_instansi',
                                    'idkepala',
                                    'email_instansi:email',
                                ],
                            ]) ?>
                            <br>
                            
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <tbody>
                                    <tr>
                                        <td><strong>Logo</strong></td>
                                        <td><strong>Kop Surat</strong></td>
                                    </tr>
                                    <tr>
                                        <td><img src="<?php echo $model->logo; ?>" class="feed-photo" alt="Logo Instansi" /></td>
                                         <td><img src="<?php echo $model->kopsurat; ?>" class="feed-photo" alt="Kop Surat" /></td>
                                    </tr>
                                </tbody>
                            </table>


                            <?= Html::a('<i class="fa fa-pencil"></i>  Update', ['update', 'id' => $model->id_instansi], ['class' => 'btn btn-primary'])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>