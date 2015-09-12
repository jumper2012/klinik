<?php
$this->breadcrumbs=array(
	'Juals',
);

$this->menu=array(
array('label'=>'Create Jual','url'=>array('create')),
array('label'=>'Manage Jual','url'=>array('admin')),
);
?>

<h1>Juals</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
