<?php
$this->breadcrumbs=array(
	'Rekam Medises'=>array('index'),
	$model->id_rekammedis=>array('view','id'=>$model->id_rekammedis),
	'Update',
);

	$this->menu=array(
	array('label'=>'List RekamMedis','url'=>array('index')),
	array('label'=>'Create RekamMedis','url'=>array('create')),
	array('label'=>'View RekamMedis','url'=>array('view','id'=>$model->id_rekammedis)),
	array('label'=>'Manage RekamMedis','url'=>array('admin')),
	);
	?>

	<h1>Update RekamMedis <?php echo $model->id_rekammedis; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>