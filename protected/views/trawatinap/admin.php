<?php

$this->menu=array(
array('label'=>'List Trawatinap','url'=>array('index')),
array('label'=>'Create Trawatinap','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('trawatinap-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center><h1>Rawat Inap</h1></center>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'trawatinap-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_rawat_inap',
		'id_kri',
		'tgl',
//		'keterangan',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
