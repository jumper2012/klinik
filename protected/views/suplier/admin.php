<?php

$this->menu = array(
    array('label' => 'List Suplier', 'url' => array('index')),
    array('label' => 'Create Suplier', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('suplier-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Daftar Supliers</h1>

<hr>
<?php
echo CHtml::Button('Daftar Untuk Supplier Baru', array('submit' => array('/suplier/Create')));
?>

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'suplier-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_suplier',
        'nama_supplier',
        'alamat',
        'no_tel',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
));
?>
