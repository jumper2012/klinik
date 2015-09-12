<?php

	$this->menu=array(
	array('label'=>'List TrawatUmum','url'=>array('index')),
	array('label'=>'Create TrawatUmum','url'=>array('create')),
	array('label'=>'View TrawatUmum','url'=>array('view','id'=>$model->id_rawatumum)),
	array('label'=>'Manage TrawatUmum','url'=>array('admin')),
	);
	?>

	<h1>Update Rekam Rawat Umum</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>