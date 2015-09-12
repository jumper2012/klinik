<?php


	$this->menu=array(
	array('label'=>'List Suplier','url'=>array('index')),
	array('label'=>'Create Suplier','url'=>array('create')),
	array('label'=>'View Suplier','url'=>array('view','id'=>$model->id_suplier)),
	array('label'=>'Manage Suplier','url'=>array('admin')),
	);
	?>

	<h1>Update Data Suplier <?php echo $model->nama_supplier; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>