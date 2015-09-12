<?php
$this->breadcrumbs=array(
	'Kartu Bersalins'=>array('index'),
	$model->id_kartu_bersalin=>array('view','id'=>$model->id_kartu_bersalin),
	'Update',
);

	$this->menu=array(
	array('label'=>'List KartuBersalin','url'=>array('index')),
	array('label'=>'Create KartuBersalin','url'=>array('create')),
	array('label'=>'View KartuBersalin','url'=>array('view','id'=>$model->id_kartu_bersalin)),
	array('label'=>'Manage KartuBersalin','url'=>array('admin')),
	);
	?>

	<h1>Update KartuBersalin <?php echo $model->id_kartu_bersalin; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>