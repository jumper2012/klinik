<?php
$this->breadcrumbs=array(
	'Belis'=>array('index'),
	$model->id_beli,
);

$this->menu=array(
array('label'=>'List Beli','url'=>array('index')),
array('label'=>'Create Beli','url'=>array('create')),
array('label'=>'Update Beli','url'=>array('update','id'=>$model->id_beli)),
array('label'=>'Delete Beli','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_beli),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Beli','url'=>array('admin')),
);
?>

<h1>View Beli #<?php echo $model->id_beli; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_beli',
		'id_obat',
		'tgltrans',
		'no_faktur',
		'distributor',
		'jlh_beli',
),
)); ?>
