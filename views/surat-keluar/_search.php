<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_suratkeluar') ?>

    <?= $form->field($model, 'no_suratkeluar') ?>

    <?= $form->field($model, 'tgl_keluar') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?= $form->field($model, 'isi') ?>

    <?php // echo $form->field($model, 'id_jenis_surat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
