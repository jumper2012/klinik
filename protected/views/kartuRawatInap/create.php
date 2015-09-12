<?php
$this->breadcrumbs=array(
	'Kartu Rawat Inaps'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List KartuRawatInap','url'=>array('index')),
array('label'=>'Manage KartuRawatInap','url'=>array('admin')),
);
?>

<h1>Create KartuRawatInap</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>