<?php
$this->breadcrumbs=array(
	'Tbersalins',
);

$this->menu=array(
array('label'=>'Create Tbersalin','url'=>array('create')),
array('label'=>'Manage Tbersalin','url'=>array('admin')),
);
?>

<h1>Tbersalins</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
