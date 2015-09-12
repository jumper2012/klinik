<?php
$this->breadcrumbs=array(
	'Juals'=>array('index'),
	$model->id_jual,
);

$this->menu=array(
array('label'=>'List Jual','url'=>array('index')),
array('label'=>'Create Jual','url'=>array('create')),
array('label'=>'Update Jual','url'=>array('update','id'=>$model->id_jual)),
array('label'=>'Delete Jual','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jual),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Jual','url'=>array('admin')),
);
?>

<h1>View Jual #<?php echo $model->id_jual; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_jual',
		'tgltrans',
		'no_resep',
		'distributor',
		'no_batch',
		'ed',
),
)); ?>
