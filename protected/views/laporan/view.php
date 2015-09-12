<?php
$this->breadcrumbs=array(
	'Laporans'=>array('index'),
	$model->id_laporan,
);

$this->menu=array(
array('label'=>'List Laporan','url'=>array('index')),
array('label'=>'Create Laporan','url'=>array('create')),
array('label'=>'Update Laporan','url'=>array('update','id'=>$model->id_laporan)),
array('label'=>'Delete Laporan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_laporan),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Laporan','url'=>array('admin')),
);
?>

<h1>View Laporan #<?php echo $model->id_laporan; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_laporan',
		'tgl',
		'keterangan',
		'masuk',
		'keluar',
		'sisa',
		'untung',
		'id_obat',
),
)); ?>
