<?php
$this->breadcrumbs=array(
	'Rekam Medises'=>array('index'),
	$model->id_rekammedis,
);

$this->menu=array(
array('label'=>'List RekamMedis','url'=>array('index')),
array('label'=>'Create RekamMedis','url'=>array('create')),
array('label'=>'Update RekamMedis','url'=>array('update','id'=>$model->id_rekammedis)),
array('label'=>'Delete RekamMedis','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rekammedis),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RekamMedis','url'=>array('admin')),
);
?>

<h1>View RekamMedis #<?php echo $model->id_rekammedis; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_rekammedis',
		'id_kartu_usg',
		'id_pasien',
		'id_kru',
		'id_kartu_bersalin',
),
)); ?>
