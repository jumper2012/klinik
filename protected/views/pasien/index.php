<?php
$this->breadcrumbs=array(
	'Pasiens',
);

$this->menu=array(
array('label'=>'Create Pasien','url'=>array('create')),
array('label'=>'Manage Pasien','url'=>array('admin')),
);
?>

<h1>Pasiens</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
