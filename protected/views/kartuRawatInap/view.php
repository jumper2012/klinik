<?php
$this->breadcrumbs=array(
	'Kartu Rawat Inaps'=>array('index'),
	$model->id_kri,
);

$this->menu=array(
array('label'=>'List KartuRawatInap','url'=>array('index')),
array('label'=>'Create KartuRawatInap','url'=>array('create')),
array('label'=>'Update KartuRawatInap','url'=>array('update','id'=>$model->id_kri)),
array('label'=>'Delete KartuRawatInap','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kri),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage KartuRawatInap','url'=>array('admin')),
);
?>

<h1>View KartuRawatInap #<?php echo $model->id_kri; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_kri',
		'id_pasien',
),
)); ?>
