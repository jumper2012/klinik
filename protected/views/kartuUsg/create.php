<?php
$this->breadcrumbs=array(
	'Kartu Usgs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List KartuUsg','url'=>array('index')),
array('label'=>'Manage KartuUsg','url'=>array('admin')),
);
?>

<h1>Create KartuUsg</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>