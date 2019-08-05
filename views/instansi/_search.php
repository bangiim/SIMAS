<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstansiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instansi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_instansi') ?>

    <?= $form->field($model, 'nama_instansi') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'website') ?>

    <?= $form->field($model, 'nama_yayasan') ?>

    <?php // echo $form->field($model, 'kepala_instansi') ?>

    <?php // echo $form->field($model, 'idkepala') ?>

    <?php // echo $form->field($model, 'email_instansi') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'kopsurat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
