<?php
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = 'Create Surat Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Surat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2><?= Html::encode($this->title) ?></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php?r=site/index">Home</a>
                </li>
                <li>
                    <a href="index.php?r=surat-keluar/index">Forms</a>
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
                        <h5><?= Html::encode($this->title) ?></h5>
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
                        <div class="surat-keluar-create">
                            <?php
                            
$form = ActiveForm::begin();
// DateRangePicker with ActiveForm and model. Check the `required` model validation for 
// the attribute. This also features configuration of Bootstrap input group addon.
echo $form->field($model, 'date_range', [
    'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
    'options'=>['class'=>'drp-container form-group']
])->widget(DateRangePicker::classname(), [
    'useWithAddon'=>true
]);
 
// DateRangePicker without ActiveForm and with an initial default value, a custom date, 
// format and a custom separator. Auto conversion of date format from PHP DateTime to 
// Moment.js DateTime is set to <code>true</code>. Custom addon markup on the right and
// make the picker open in the direction right to left.
$addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;
echo '<label class="control-label">Date Range</label>';
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
    'name'=>'date_range_1',
    'value'=>'01-Jan-14 to 20-Feb-14',
    'convertFormat'=>true,
    'useWithAddon'=>true,
    'pluginOptions'=>[
        'locale'=>[
            'format'=>'d-M-y',
            'separator'=>' to ',
        ],
        'opens'=>'left'
    ]
]) . $addon;
echo '</div>';
 
// DateRangePicker in a dropdown format (uneditable/hidden input) and uses the preset dropdown.
echo '<label class="control-label">Date Range</label>';
echo '<div class="drp-container">';
echo DateRangePicker::widget([
    'name'=>'date_range_2',
    'presetDropdown'=>true,
    'hideInput'=>true
]);
echo '</div>';
 
//  Date and Time picker with time increment of 15 minutes and without any input group addons.
echo DateRangePicker::widget([
    'name'=>'date_range_3',
    'value'=>'2015-10-19 12:00 AM - 2015-11-03 01:00 PM',
    'convertFormat'=>true,
    'pluginOptions'=>[
        'timePicker'=>true,
        'timePickerIncrement'=>15,
        'locale'=>['format'=>'Y-m-d h:i A']
    ]            
]);
 
// Single date picker without range.
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
    'name'=>'date_range_4',
    'value'=>'01/12/2015',
    'useWithAddon'=>true,
    'pluginOptions'=>[
        'singleDatePicker'=>true,
        'showDropdowns'=>true
    ]
]) . $addon;
echo '</div>';
 
// Single date time picker without range.
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
    'name'=>'date_range_5',
    'value'=>'2015-10-19 12:00 AM',
    'useWithAddon'=>true,
    'convertFormat'=>true,
    'pluginOptions'=>[
        'timePicker'=>true,
        'timePickerIncrement'=>15,
        'locale'=>['format' => 'Y-m-d h:i A'],
        'singleDatePicker'=>true,
        'showDropdowns'=>true
    ]
]) . $addon;
echo '</div>';
 
// Advanced configuration using separate start and end attributes to store information.
// Note that you can have these attributes have their own validation rules in the model.
// In the scenario that your base attribute (e.g. `kvdate1` in this example), does not 
// have an initial value, then the initial value will be auto derived from the start and 
// end attributes.
$model->datetime_start = '2016-02-11';
$model->datetime_end = '2016-03-15';
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
    'model'=>$model,
    'attribute' => 'kvdate1',
    'useWithAddon'=>true,
    'convertFormat'=>true,
    'startAttribute' => 'datetime_start',
    'endAttribute' => 'datetime_end',
    'pluginOptions'=>[
        'locale'=>['format' => 'Y-m-d'],
    ]
]) . $addon;
echo '</div>';
 
// Extension of above scenario using separate start and end attributes 
// but without a model. You can set the initial value within 
// `startInputOptions` and `endInputOptions`.
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
    'name'=>'kvdate2',
    'useWithAddon'=>true,
    'convertFormat'=>true,
    'startAttribute' => 'from_date',
    'endAttribute' => 'to_date',
    'startInputOptions' => ['value' => '2017-06-11'],
    'endInputOptions' => ['value' => '2017-07-20'],
    'pluginOptions'=>[
        'locale'=>['format' => 'Y-m-d'],
    ]
]) . $addon;
echo '</div>';
 
// Variation of above scenario by setting a value directly in base attribute
// instead of setting separate attributes. In this case the individual
// attributes will be set automatically. 
echo '<div class="input-group drp-container">';
echo DateRangePicker::widget([
    'name'=>'kvdate3',
    'value' => '2018-10-04 - 2018-11-14',
    'useWithAddon'=>true,
    'convertFormat'=>true,
    'startAttribute' => 'from_date',
    'endAttribute' => 'to_date',
    'pluginOptions'=>[
        'locale'=>['format' => 'Y-m-d'],
    ]
]) . $addon;
echo '</div>';
ActiveForm::end();
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
