<?php
$this->breadcrumbs=array(
	'Kartu Bersalins',
);

$this->menu=array(
array('label'=>'Create KartuBersalin','url'=>array('create')),
array('label'=>'Manage KartuBersalin','url'=>array('admin')),
);
?>

<h1>Kartu Bersalins</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
