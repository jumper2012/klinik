<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'jual-beli-form',
    'type' => 'inline',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>

<?php
    $list = CHtml::listData(Obat::model()->findAll(), 'id_obat','nama');
    echo $form->dropDownListGroup(
            $model, 'nama', array('wrapperHtmlOptions' => array(
            'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
            'data' => $list,
            'htmlOptions' => array(),
        )
            )
    );?>
 <?php
                $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context' => 'primary',
                    'label' => $model->isNewRecord ? 'Search' : 'Save',
                ));
                ?>























<?php
 $records=Obat::model()->findAll();
 $list=CHtml::listData($records,'id_obat','nama');
 echo CHtml::dropDownList('names',null,$list);
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'jual-beli-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'id_obat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php echo $form->datePickerGroup($model,'tgltrans',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php echo $form->textFieldGroup($model,'no_faktur',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->textFieldGroup($model,'no_resep',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->textFieldGroup($model,'distributor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->textFieldGroup($model,'jlh_beli',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'jlh_jual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'sisa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'no_batch',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

	<?php echo $form->textFieldGroup($model,'ed',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

