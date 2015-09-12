<?php
$this->breadcrumbs=array(
	'Obats'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Obat','url'=>array('index')),
array('label'=>'Manage Obat','url'=>array('admin')),
);
?>

<h1>Pembelian Obat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2,)); ?>