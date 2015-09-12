<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'obat-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldGroup($model,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>32)))); ?>
<?php echo $form->dropDownListGroup($model,'satuan_brg', array('widgetOptions'=>array('data'=>array("Botol"=>"Botol","Tube"=>"Tube","Kotak"=>"Kotak","Strip"=>"Strip","Biji"=>"Biji","Kapsul"=>"Kapsul","Kg"=>"Kg","Mg"=>"Mg",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

<?php echo $form->textFieldGroup($model, 'jumlah', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->textFieldGroup($model, 'hargabeli', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>
<?php echo $form->textFieldGroup($model, 'hargajual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php //echo $form->textFieldGroup($model,'hargajual',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
<?php
echo $form->datePickerGroup(
        $model, 'tgl_kadaluarsa', array(
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

<?php echo $form->textFieldGroup($model2, 'no_faktur', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>

<?php $nama = CHtml::listData(Suplier::model()->findAll(), 'nama_supplier', 'nama_supplier');?>
    Distributor<br>
    <?php
            $this->widget('ext.select2.ESelect2', array(
                'model' => $model2,
                'attribute' => 'distributor',
                'data' => $nama,
                'htmlOptions' => array(
                    'style' => 'width:330px',
                    'prompt' => '-- Pilih Distributor --'
                ),)
            );
            ?>

<div class="form-actions">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
