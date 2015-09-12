<?php
$this->breadcrumbs=array(
	'Jual Belis'=>array('index'),
	$model->id_jualbeli,
);

$this->menu=array(
array('label'=>'List JualBeli','url'=>array('index')),
array('label'=>'Create JualBeli','url'=>array('create')),
array('label'=>'Update JualBeli','url'=>array('update','id'=>$model->id_jualbeli)),
array('label'=>'Delete JualBeli','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jualbeli),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JualBeli','url'=>array('admin')),
);
?>

<h1>View JualBeli #<?php echo $model->id_jualbeli; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_jualbeli',
		'id_obat',
		'tgltrans',
		'no_faktur',
		'no_resep',
		'distributor',
		'jlh_beli',
		'jlh_jual',
		'no_batch',
		'ed',
),
)); ?>
