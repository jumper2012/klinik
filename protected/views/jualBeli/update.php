<?php
$this->breadcrumbs=array(
	'Jual Belis'=>array('index'),
	$model->id_jualbeli=>array('view','id'=>$model->id_jualbeli),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JualBeli','url'=>array('index')),
	array('label'=>'Create JualBeli','url'=>array('create')),
	array('label'=>'View JualBeli','url'=>array('view','id'=>$model->id_jualbeli)),
	array('label'=>'Manage JualBeli','url'=>array('admin')),
	);
	?>

	<h1>Update JualBeli <?php echo $model->id_jualbeli; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>