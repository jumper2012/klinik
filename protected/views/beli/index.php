<?php
$this->breadcrumbs=array(
	'Belis',
);

$this->menu=array(
array('label'=>'Create Beli','url'=>array('create')),
array('label'=>'Manage Beli','url'=>array('admin')),
);
?>

<h1>Belis</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
