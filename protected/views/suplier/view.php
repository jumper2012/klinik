<?php

$this->menu=array(
array('label'=>'List Suplier','url'=>array('index')),
array('label'=>'Create Suplier','url'=>array('create')),
array('label'=>'Update Suplier','url'=>array('update','id'=>$model->id_suplier)),
array('label'=>'Delete Suplier','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_suplier),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Suplier','url'=>array('admin')),
);
?>

<h1>Detail Suplier <?php echo $model->nama_supplier; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_suplier',
		'nama_supplier',
		'alamat',
		'no_tel',
),
)); ?>
