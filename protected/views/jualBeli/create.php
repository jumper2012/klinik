<?php
$this->breadcrumbs=array(
	'Jual Belis'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JualBeli','url'=>array('index')),
array('label'=>'Manage JualBeli','url'=>array('admin')),
);
?>

<h1>Create JualBeli</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>