<?php
$this->breadcrumbs=array(
	'Kartu Rawat Umums'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List KartuRawatUmum','url'=>array('index')),
array('label'=>'Manage KartuRawatUmum','url'=>array('admin')),
);
?>

<h1>Create KartuRawatUmum</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>