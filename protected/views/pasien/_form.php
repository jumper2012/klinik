<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pasien-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>


<?php
echo $form->datePickerGroup(
        $model, 'tanggal_lahir', array(
    'widgetOptions' => array(
        'options' => array(
            'showButtonPanel' => true,
            'format' => 'yyyy-mm-dd',
            'viewformat' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'todayBtn' => "linked",
        ),
        'htmlOptions' => array(
            'class' => 'span5'
        )
    ),
    'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Pilih Tanggal'
        )
);
?>

	<?php echo $form->textFieldGroup($model,'alamat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->textFieldGroup($model,'pekerjaan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->dropDownListGroup($model,'jenis_kelamin', array('widgetOptions'=>array('data'=>array("Perempuan"=>"Perempuan","Laki - Laki"=>"Laki - Laki",""=>"",""=>"",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

	<?php echo $form->textFieldGroup($model,'suku',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->dropDownListGroup($model,'agama', array('widgetOptions'=>array('data'=>array("Kristen Protestan"=>"Kristen Protestan","Islam"=>"Islam","Katolik"=>"Katolik","Hindu/Budha"=>"Hindu/Budha",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

	<?php echo $form->textFieldGroup($model,'tel',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
