<?php
//$this->breadcrumbs=array(
//	'Obats'=>array('index'),
//	'Manage',
//);

$this->menu = array(
    array('label' => 'List Obat', 'url' => array('index')),
    array('label' => 'Create Obat', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('obat-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1><center>Inventori Obat Klinik Elivin</center></h1>

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
    'id' => 'obat-grid',
    'dataProvider' => $model->search(),
    'rowCssClassExpression'=>'($data->jumlah==0)?"normal":"especial"',
    'filter' => $model,
    'columns' => array(
//		'id_obat',
        'nama',
        'jumlah',
        'hargabeli',
        'hargajual',
        'tgl_kadaluarsa',
        /*
          'satuan_brg',
         */
                            array(
                                'header' => 'Aksi',
                                'class' => 'booster.widgets.TbButtonColumn',
                                'template' => '{view}{delete}',
                             //   'viewButtonUrl' => 'Yii::app()->createUrl(\'beli/update\',array(\'id\'=>\'\'.$data->id_beli.\'\'))',
                            ),
    ),
));
?>
