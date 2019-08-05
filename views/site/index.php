<?php

/* @var $this yii\web\View */

$this->title = 'SIMAS';
?>

        <div class="row border-bottom white-bg dashboard-header">
            <div class="col-sm-3">
                <h2>Welcome to SIMAS</h2>
                <small>Sistem Informasi Manajemen dan Arsip Surat</small>
                
            </div>
            <div class="col-sm-6">
                
            </div>
            <div class="col-sm-3">
                
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-sm-6">
                    <a href="index.php?r=surat-masuk">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span> Jumlah Surat Masuk </span>
                                    <h2 class="font-bold"><?=$jumlah_surat_masuk;?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="index.php?r=surat-keluar">
                        <div class="widget style1 lazur-bg">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span> Jumlah Surat Keluar </span>
                                    <h2 class="font-bold"><?=$jumlah_surat_keluar;?></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    
