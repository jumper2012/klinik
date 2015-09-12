<?php
$this->breadcrumbs=array(
	'Juals'=>array('index'),
	$model->id_jual=>array('view','id'=>$model->id_jual),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Jual','url'=>array('index')),
	array('label'=>'Create Jual','url'=>array('create')),
	array('label'=>'View Jual','url'=>array('view','id'=>$model->id_jual)),
	array('label'=>'Manage Jual','url'=>array('admin')),
	);
	?>

	<h1>Update Jual <?php echo $model->id_jual; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>