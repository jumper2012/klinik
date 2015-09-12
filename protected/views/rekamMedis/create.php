<?php
$this->breadcrumbs=array(
	'Rekam Medises'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List RekamMedis','url'=>array('index')),
array('label'=>'Manage RekamMedis','url'=>array('admin')),
);
?>

<h1>Create RekamMedis</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>