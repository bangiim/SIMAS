<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instansi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instansi-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_yayasan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idkepala')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kopsurat')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> Save' : '<i class="fa fa-pencil"> </i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
