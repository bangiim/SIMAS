<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisSuratSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-surat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'id_jenis_surat') ?>

    <?= $form->field($model, 'kode_jenis') ?>

    <?= $form->field($model, 'nama_jenis') ?>

    <?= $form->field($model, 'content_jenis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
