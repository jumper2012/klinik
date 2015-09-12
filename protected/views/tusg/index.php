<?php
$this->breadcrumbs=array(
	'Tusgs',
);

$this->menu=array(
array('label'=>'Create Tusg','url'=>array('create')),
array('label'=>'Manage Tusg','url'=>array('admin')),
);
?>

<h1>Tusgs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
