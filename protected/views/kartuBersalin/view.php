<?php
$this->breadcrumbs=array(
	'Kartu Bersalins'=>array('index'),
	$model->id_kartu_bersalin,
);

$this->menu=array(
array('label'=>'List KartuBersalin','url'=>array('index')),
array('label'=>'Create KartuBersalin','url'=>array('create')),
array('label'=>'Update KartuBersalin','url'=>array('update','id'=>$model->id_kartu_bersalin)),
array('label'=>'Delete KartuBersalin','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kartu_bersalin),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage KartuBersalin','url'=>array('admin')),
);
?>

<h1>View KartuBersalin #<?php echo $model->id_kartu_bersalin; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_kartu_bersalin',
		'id_pasien',
),
)); ?>
