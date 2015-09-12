<?php
$this->breadcrumbs=array(
	'Trawatinaps'=>array('index'),
	$model->id_rawat_inap=>array('view','id'=>$model->id_rawat_inap),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Trawatinap','url'=>array('index')),
	array('label'=>'Create Trawatinap','url'=>array('create')),
	array('label'=>'View Trawatinap','url'=>array('view','id'=>$model->id_rawat_inap)),
	array('label'=>'Manage Trawatinap','url'=>array('admin')),
	);
	?>

	<h1>Update Trawatinap <?php echo $model->id_rawat_inap; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>