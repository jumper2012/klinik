<?php

$this->menu = array(
    array('label' => 'List TrawatUmum', 'url' => array('index')),
    array('label' => 'Create TrawatUmum', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('trawat-umum-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center><h1>Rawat Umum</h1></center>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'trawat-umum-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_rawatumum',
        'id_kru',
        'tgl',
       // 'historia_morbi',
       // 'terapi',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
