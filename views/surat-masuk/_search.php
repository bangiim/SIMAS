<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_suratmasuk') ?>

    <?= $form->field($model, 'no_suratmasuk') ?>

    <?= $form->field($model, 'no_urut') ?>

    <?= $form->field($model, 'pengirim') ?>

    <!--?= $form->field($model, 'tgl_masuk') ?-->

    <?php // echo $form->field($model, 'perihal_surat') ?>

    <?php // echo $form->field($model, 'upload_berkas') ?>

    <?php // echo $form->field($model, 'id_jenis_surat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
