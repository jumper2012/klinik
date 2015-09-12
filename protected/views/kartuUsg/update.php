<?php
$this->breadcrumbs=array(
	'Kartu Usgs'=>array('index'),
	$model->id_kartu_usg=>array('view','id'=>$model->id_kartu_usg),
	'Update',
);

	$this->menu=array(
	array('label'=>'List KartuUsg','url'=>array('index')),
	array('label'=>'Create KartuUsg','url'=>array('create')),
	array('label'=>'View KartuUsg','url'=>array('view','id'=>$model->id_kartu_usg)),
	array('label'=>'Manage KartuUsg','url'=>array('admin')),
	);
	?>

	<h1>Update KartuUsg <?php echo $model->id_kartu_usg; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>