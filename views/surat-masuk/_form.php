<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\JenisSurat;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SuratMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-masuk-form">

    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'no_urut')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'no_suratmasuk')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'pengirim')->textInput(['maxlength' => true]) ?>
    <?php //<?= $form->field($model, 'tgl_masuk')->textInput() ?>
    <?= $form->field($model, 'tgl_masuk')->widget(DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'name' => 'tgl_masuk',
            'template' => '{addon}{input}', 
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    <?= $form->field($model, 'perihal_surat')->textInput(['maxlength' => true]) ?>
    <?php /*<?= 
        $form->field($model, 'id_jenis_surat')->dropDownList(
            ArrayHelper::map(JenisSurat::find()->all(),'id_jenis_surat','nama_jenis'),
            ['prompt'=>'Pilih Jenis']
        )*/
    ?>

    <?= $form->field($model, 'upload_berkas')->fileInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'id_jenis_surat')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> Save' : '<i class="fa fa-pencil"> </i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
