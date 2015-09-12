<?php
$this->breadcrumbs=array(
	'Obats',
);

$this->menu=array(
array('label'=>'Create Obat','url'=>array('create')),
array('label'=>'Manage Obat','url'=>array('admin')),
);
?>

<h1>Obats</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
