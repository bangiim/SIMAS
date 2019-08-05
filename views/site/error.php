<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
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
                       <div class="site-error">
                            <h1><?= Html::encode($this->title) ?></h1>
                            <div class="alert alert-danger">
                                <?= nl2br(Html::encode($message)) ?>
                            </div>
                            <p>
                                The above error occurred while the Web server was processing your request.
                            </p>
                            <p>
                                Please contact us if you think this is a server error. Thank you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
