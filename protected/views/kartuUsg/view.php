<?php
$this->breadcrumbs=array(
	'Kartu Usgs'=>array('index'),
	$model->id_kartu_usg,
);

$this->menu=array(
array('label'=>'List KartuUsg','url'=>array('index')),
array('label'=>'Create KartuUsg','url'=>array('create')),
array('label'=>'Update KartuUsg','url'=>array('update','id'=>$model->id_kartu_usg)),
array('label'=>'Delete KartuUsg','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kartu_usg),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage KartuUsg','url'=>array('admin')),
);
?>

<h1>View KartuUsg #<?php echo $model->id_kartu_usg; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_kartu_usg',
		'id_pasien',
),
)); ?>
