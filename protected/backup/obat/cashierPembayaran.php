<?php
/** @var TbActiveForm $form */
$form = $this->beginWidget(
        'booster.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'),
        )
);
?>
<?php
$nama = CHtml::listData(Obat::model()->findAll(), 'id_obat', 'nama');

echo $form->dropDownListGroup($model, 'nama', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'widgetOptions' => array(
        'data' => $nama,
        'htmlOptions' => array(
            'ajax' => array(
                'type' => 'POST',
                'url' => CController::createUrl('Obat/deskripsi'),
                'update' => '#' . CHtml::activeId($model, 'satuan_brg'),
                'beforeSend' => 'function() {
       $("#Profil_prodi_id").find("option").remove();
       }',
            )
        ),
    )
        )
);
?>
<div class="row">
 <?php echo $form->labelEx($model,'satuan_brg'); ?>
 <?php echo $form->dropDownList($model,'satuan_brg',
 (!$model->isNewRecord) ? $model->prodiList() :array(),
 array(
   'prompt'=>'-- Pilihan --',
 )
 ); ?> 
 <?php echo $form->error($model,'satuan_brg'); ?>
</div>



<?php
$this->widget(
        'booster.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset'));
?>


<?php
$this->endWidget();
unset($form);