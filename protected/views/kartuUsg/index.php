<?php
$this->breadcrumbs=array(
	'Kartu Usgs',
);

$this->menu=array(
array('label'=>'Create KartuUsg','url'=>array('create')),
array('label'=>'Manage KartuUsg','url'=>array('admin')),
);
?>

<h1>Kartu Usgs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
