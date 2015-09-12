<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'trawat-umum-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldGroup($model,'id_kru',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

<?php
echo $form->datePickerGroup(
        $model, 'tgl', array(
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
<hr>
<?php
echo $form->ckEditorGroup(
        $model, 'historia_morbi', array(
    'wrapperHtmlOptions' => array(
    /* 'class' => 'col-sm-5', */
    ),
    'widgetOptions' => array(
        'editorOptions' => array(
            'fullpage' => 'js:true',
        /* 'width' => '640', */
        /* 'resize_maxWidth' => '640', */
        /* 'resize_minWidth' => '320' */
        )
    )
        )
);
?>
<hr>
<?php
echo $form->ckEditorGroup(
        $model, 'terapi', array(
    'wrapperHtmlOptions' => array(
    /* 'class' => 'col-sm-5', */
    ),
    'widgetOptions' => array(
        'editorOptions' => array(
            'fullpage' => 'js:true',
        /* 'width' => '640', */
        /* 'resize_maxWidth' => '640', */
        /* 'resize_minWidth' => '320' */
        )
    )
        )
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
