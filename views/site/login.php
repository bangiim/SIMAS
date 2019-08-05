<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In SIMAS';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
 
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name"><span class="fa fa-envelope"></span></h1>
            </div>
            <h2><strong>Welcome to SIMAS</strong></h2>
            <p>Sistem Informasi Manajemen dan Arsip Surat
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <div class="widget-text-box"> 

                <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
 
                <?= $form
                    ->field($model, 'username', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
         
                <?= $form
                    ->field($model, 'password', $fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
         
                <div class="row">
                    <div class="col-xs-6">
                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>
                    <div class="col-xs-6">
                        <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>
                    </div>
                </div>
         
                <?php ActiveForm::end(); ?>
            </div>
            <p class="m-t">
                <small>
                    <strong>Copyright</strong> &copy; SIMAS - Universitas Darussalam Gontor <?= date('Y') ?>
                </small> 
            </p>
        </div>
    </div>