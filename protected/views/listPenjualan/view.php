<?php
$this->breadcrumbs=array(
	'List Penjualans'=>array('index'),
	$model->id_list_penjualan,
);

$this->menu=array(
array('label'=>'List ListPenjualan','url'=>array('index')),
array('label'=>'Create ListPenjualan','url'=>array('create')),
array('label'=>'Update ListPenjualan','url'=>array('update','id'=>$model->id_list_penjualan)),
array('label'=>'Delete ListPenjualan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_list_penjualan),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ListPenjualan','url'=>array('admin')),
);
?>

<h1>View ListPenjualan #<?php echo $model->id_list_penjualan; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_list_penjualan',
		'nama_obat',
		'qty',
		'harga_satuan',
		'total',
		'id_jual',
		'id_obat',
),
)); ?>
