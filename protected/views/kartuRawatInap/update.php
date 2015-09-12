<?php
$this->breadcrumbs=array(
	'Kartu Rawat Inaps'=>array('index'),
	$model->id_kri=>array('view','id'=>$model->id_kri),
	'Update',
);

	$this->menu=array(
	array('label'=>'List KartuRawatInap','url'=>array('index')),
	array('label'=>'Create KartuRawatInap','url'=>array('create')),
	array('label'=>'View KartuRawatInap','url'=>array('view','id'=>$model->id_kri)),
	array('label'=>'Manage KartuRawatInap','url'=>array('admin')),
	);
	?>

	<h1>Update KartuRawatInap <?php echo $model->id_kri; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>