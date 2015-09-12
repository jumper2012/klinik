<?php

	$this->menu=array(
	array('label'=>'List ListPenjualan','url'=>array('index')),
	array('label'=>'Create ListPenjualan','url'=>array('create')),
	array('label'=>'View ListPenjualan','url'=>array('view','id'=>$model->id_list_penjualan)),
	array('label'=>'Manage ListPenjualan','url'=>array('admin')),
	);
	?>

	<h1>Update List Penjualan</h1>

<?php echo $this->renderPartial('_form_update',array('model'=>$model)); ?>