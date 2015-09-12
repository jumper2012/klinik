<?php
$this->breadcrumbs=array(
	'Kartu Rawat Umums',
);

$this->menu=array(
array('label'=>'Create KartuRawatUmum','url'=>array('create')),
array('label'=>'Manage KartuRawatUmum','url'=>array('admin')),
);
?>

<h1>Kartu Rawat Umums</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
