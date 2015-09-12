<?php


	$this->menu=array(
	array('label'=>'List Tbersalin','url'=>array('index')),
	array('label'=>'Create Tbersalin','url'=>array('create')),
	array('label'=>'View Tbersalin','url'=>array('view','id'=>$model->id_bersalin)),
	array('label'=>'Manage Tbersalin','url'=>array('admin')),
	);
	?>

	<h1>Update Rekam Bersalin</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>