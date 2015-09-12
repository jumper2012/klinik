<?php
$this->breadcrumbs=array(
	'Kartu Rawat Inaps',
);

$this->menu=array(
array('label'=>'Create KartuRawatInap','url'=>array('create')),
array('label'=>'Manage KartuRawatInap','url'=>array('admin')),
);
?>

<h1>Kartu Rawat Inaps</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
