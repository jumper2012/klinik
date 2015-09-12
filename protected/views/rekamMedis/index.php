<?php
$this->breadcrumbs=array(
	'Rekam Medises',
);

$this->menu=array(
array('label'=>'Create RekamMedis','url'=>array('create')),
array('label'=>'Manage RekamMedis','url'=>array('admin')),
);
?>

<h1>Rekam Medises</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
