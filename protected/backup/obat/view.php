<?php
//$this->breadcrumbs=array(
//	'Obats'=>array('index'),
//	$model->id_obat,
//);

$this->menu=array(
array('label'=>'List Obat','url'=>array('index')),
array('label'=>'Create Obat','url'=>array('create')),
array('label'=>'Update Obat','url'=>array('update','id'=>$model->id_obat)),
array('label'=>'Delete Obat','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_obat),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Obat','url'=>array('admin')),
);
?>

<h1>Detail Obat <?php echo $model->nama; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_obat',
		'nama',
		'jumlah',
		'hargabeli',
		'hargajual',
		'tgl_kadaluarsa',
		'satuan_brg',
),
)); ?>
