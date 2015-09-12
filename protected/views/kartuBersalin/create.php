<?php
$this->breadcrumbs=array(
	'Kartu Bersalins'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List KartuBersalin','url'=>array('index')),
array('label'=>'Manage KartuBersalin','url'=>array('admin')),
);
?>

<h1>Create KartuBersalin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>