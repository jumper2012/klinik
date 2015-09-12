<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'obat-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php
$nama = CHtml::listData(Obat::model()->findAll(), 'id_obat', 'nama');

echo $form->dropDownListGroup($model, 'nama', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-',
    ),
    'widgetOptions' => array(
        'data' => $nama,
        'htmlOptions' => array('class' => 'span5', 'maxlength' => 10)
    )
        )
);
?>
<?php //echo $form->textFieldGroup($model, 'nama', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 32)))); ?>

<?php echo $form->textFieldGroup($model, 'jumlah', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->textFieldGroup($model, 'hargabeli', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->textFieldGroup($model, 'hargajual', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->datePickerGroup($model, 'tgl_kadaluarsa', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.')); ?>

    <?php echo $form->textFieldGroup($model, 'satuan_brg', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>

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
