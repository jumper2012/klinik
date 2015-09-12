<?php

	$this->menu=array(
	array('label'=>'List Tusg','url'=>array('index')),
	array('label'=>'Create Tusg','url'=>array('create')),
	array('label'=>'View Tusg','url'=>array('view','id'=>$model->id_usg)),
	array('label'=>'Manage Tusg','url'=>array('admin')),
	);
	?>

	<h1>Update Rekam USG <?php echo $model->id_usg; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>