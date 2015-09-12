<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'tusg-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldGroup($model,'id_kartu_usg',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

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


<?php echo $form->textFieldGroup($model, 'nama_suami', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 32)))); ?>

<?php echo  $form->textFieldGroup($model, 'grafida', array('widgetOptions' => array('htmlOptions' => array('class' => 'span1', 'maxlength' => 5)))); ?>

<?php
echo $form->datePickerGroup(
        $model, 'hpht', array(
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

<?php
echo $form->datePickerGroup(
        $model, 'ttp', array(
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

<?php echo $form->textFieldGroup($model, 'td_bb', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 32)))); ?>

<hr>
<?php
echo $form->ckEditorGroup(
        $model, 'keluhan', array(
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

<?php echo $form->textFieldGroup($model, 'usia_kehaliman', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 32)))); ?>

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


<hr>
<?php
echo $form->ckEditorGroup(
        $model, 'keterangan', array(
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
