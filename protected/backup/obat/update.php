<?php
$this->breadcrumbs=array(
	'Obats'=>array('index'),
	$model->id_obat=>array('view','id'=>$model->id_obat),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Obat','url'=>array('index')),
	array('label'=>'Create Obat','url'=>array('create')),
	array('label'=>'View Obat','url'=>array('view','id'=>$model->id_obat)),
	array('label'=>'Manage Obat','url'=>array('admin')),
	);
	?>

	<h1>Pembelian Obat <b><?php echo $model->nama; ?></b></h1>

<?php echo $this->renderPartial('_form_obat_existing',array('model'=>$model,'model2'=>$model2)); ?>