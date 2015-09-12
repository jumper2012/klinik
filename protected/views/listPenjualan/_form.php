<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'list-penjualan-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
    
        <?php
            $result_count = Yii::app()->db->createCommand("SELECT jumlah FROM obat WHERE `id_obat`= '$model->id_obat'")->queryAll();
            //var_dump($result_count);
            $banyak = 0;
            foreach ($result_count as $counter) {
                $banyak = $counter["jumlah"];
            }
            //echo $banyak;
            
            $list = array();
            $list[0]=0;
            for($temp=1;$temp<=$banyak;$temp++)
            {
                $list[$temp]= $temp;
            }
        ?>

	<?php //echo $form->textFieldGroup($model,'nama_obat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>25)))); ?>

	<?php //echo $form->textFieldGroup($model,'qty',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <?php echo $form->dropDownList($model,'qty', $list, array('empty'=>'select Type')); ?>
        <?php //echo CHtml::dropDownList('qty', $model, $list, array('empty' => 'Jumlah Beli'));?>
	<?php //echo $form->textFieldGroup($model,'harga_satuan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'total',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'id_jual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php //echo $form->textFieldGroup($model,'id_obat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
