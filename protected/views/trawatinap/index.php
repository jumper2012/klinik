<?php
$this->breadcrumbs=array(
	'Trawatinaps',
);

$this->menu=array(
array('label'=>'Create Trawatinap','url'=>array('create')),
array('label'=>'Manage Trawatinap','url'=>array('admin')),
);
?>

<h1>Trawatinaps</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
