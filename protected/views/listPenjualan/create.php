<?php
$this->breadcrumbs=array(
	'List Penjualans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ListPenjualan','url'=>array('index')),
array('label'=>'Manage ListPenjualan','url'=>array('admin')),
);
?>

<h1>Create ListPenjualan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>