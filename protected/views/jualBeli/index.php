<?php
$this->breadcrumbs=array(
	'Jual Belis',
);

$this->menu=array(
array('label'=>'Create JualBeli','url'=>array('create')),
array('label'=>'Manage JualBeli','url'=>array('admin')),
);
?>

<h1>Jual Belis</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
