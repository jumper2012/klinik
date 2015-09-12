<?php
$this->breadcrumbs=array(
	'Supliers',
);

$this->menu=array(
array('label'=>'Create Suplier','url'=>array('create')),
array('label'=>'Manage Suplier','url'=>array('admin')),
);
?>

<h1>Supliers</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
