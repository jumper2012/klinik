<?php
$this->breadcrumbs=array(
	'Trawat Umums',
);

$this->menu=array(
array('label'=>'Create TrawatUmum','url'=>array('create')),
array('label'=>'Manage TrawatUmum','url'=>array('admin')),
);
?>

<h1>Trawat Umums</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
