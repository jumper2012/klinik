<?php
$this->breadcrumbs=array(
	'Kartu Rawat Umums'=>array('index'),
	$model->id_kru=>array('view','id'=>$model->id_kru),
	'Update',
);

	$this->menu=array(
	array('label'=>'List KartuRawatUmum','url'=>array('index')),
	array('label'=>'Create KartuRawatUmum','url'=>array('create')),
	array('label'=>'View KartuRawatUmum','url'=>array('view','id'=>$model->id_kru)),
	array('label'=>'Manage KartuRawatUmum','url'=>array('admin')),
	);
	?>

	<h1>Update KartuRawatUmum <?php echo $model->id_kru; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>