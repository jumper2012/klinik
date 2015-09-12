<?php
$this->breadcrumbs=array(
	'Kartu Rawat Umums'=>array('index'),
	$model->id_kru,
);

$this->menu=array(
array('label'=>'List KartuRawatUmum','url'=>array('index')),
array('label'=>'Create KartuRawatUmum','url'=>array('create')),
array('label'=>'Update KartuRawatUmum','url'=>array('update','id'=>$model->id_kru)),
array('label'=>'Delete KartuRawatUmum','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_kru),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage KartuRawatUmum','url'=>array('admin')),
);
?>

<h1>View KartuRawatUmum #<?php echo $model->id_kru; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_kru',
		'id_pasien',
),
)); ?>
