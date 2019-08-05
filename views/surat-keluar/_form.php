<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use app\models\JenisSurat;
use app\models\SuratKeluarSearch;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-form">

	<?php $form = ActiveForm::begin(); ?>
	<?php
		$items = ArrayHelper::map(JenisSurat::find()->all(),'id_jenis_surat','nama_jenis');
		$options = [];
		foreach (JenisSurat::find()->all() as $i) {
			$options[$i->id_jenis_surat] = [
				'data-count'   => SuratKeluarSearch::count_some()+1,
				'data-kode'    => $i->kode_jenis,
				'data-content' => $i->content_jenis
			];
		}
	?>

	<?= 
		$form->field($model, 'id_jenis_surat')->dropDownList(
			$items,
			[
				'prompt'=>'Pilih Jenis',
				'options'=> $options
			]
		)
	?>

	<?= $form->field($model, 'no_suratkeluar')->textInput(['readonly'=>true]) ?>
	
	<?= $form->field($model, 'tgl_keluar')->widget(DatePicker::className(), [
			// inline too, not bad
			'inline' => false,
			'name' => 'tgl_masuk',
			'template' => '{addon}{input}', 
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]);?>

	<?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'isi')->widget(TinyMce::className(), [
		'options' => ['rows' => 12],
		'language' => 'es',
		'clientOptions' => [
			'plugins' => [
				"advlist autolink lists link charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste"
			],
			'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		]
	]);?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> Save' : '<i class="fa fa-pencil"> </i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		 <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Cancel</button>
	</div>

	<?php ActiveForm::end(); ?>

</div>