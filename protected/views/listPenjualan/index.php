<?php
$this->breadcrumbs=array(
	'List Penjualans',
);

$this->menu=array(
array('label'=>'Create ListPenjualan','url'=>array('create')),
array('label'=>'Manage ListPenjualan','url'=>array('admin')),
);
?>

<h1>List Penjualans</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
