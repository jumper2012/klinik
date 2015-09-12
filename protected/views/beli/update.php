<?php
//$this->breadcrumbs=array(
//	'Belis'=>array('index'),
//	$model->id_beli=>array('view','id'=>$model->id_beli),
//	'Update',
//);

	$this->menu=array(
	array('label'=>'List Beli','url'=>array('index')),
	array('label'=>'Create Beli','url'=>array('create')),
	array('label'=>'View Beli','url'=>array('view','id'=>$model->id_beli)),
	array('label'=>'Manage Beli','url'=>array('admin')),
	);
	?>

	<h1>Update Beli <?php echo $model->idObat->nama; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>