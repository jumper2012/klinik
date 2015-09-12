<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'beli-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php
$nama = CHtml::listData(Obat::model()->findAll(), 'id_obat', 'nama');

//echo $form->dropDownListGroup($model, 'id_obat', array(
////    'wrapperHtmlOptions' => array(
////     //   'class' => 'col-sm-5',
////    ),
//    'widgetOptions' => array(
//        'data' => $nama,
//        'htmlOptions' => array(
//            'ajax' => array(
//                'type' => 'POST',
//                'url' => CController::createUrl('Obat/deskripsi'),
//                'class' => 'span5',
//                //'update' => '#' . CHtml::activeId($model, 'satuan_brg'),
//            )
//        ),
//    )
//        )
//);
?>
<?php //echo $form->textFieldGroup($model, 'id_obat', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 10)))); ?>

<?php echo $form->datePickerGroup($model, 'tgltrans', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->textFieldGroup($model, 'no_faktur', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 32)))); ?>

<?php //echo $form->textFieldGroup($model, 'distributor', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 32)))); ?>
<?php
$nama = CHtml::listData(Suplier::model()->findAll(), 'nama_supplier', 'nama_supplier');

echo $form->dropDownListGroup($model, 'distributor', array(
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

    <?php //echo $form->textFieldGroup($model, 'jlh_beli', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5')))); ?>

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
