<?php

$this->menu=array(
array('label'=>'List Tbersalin','url'=>array('index')),
array('label'=>'Create Tbersalin','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tbersalin-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center><h1>Rawat Bersalin</h1></center>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tbersalin-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_bersalin',
		'id_kartu_bersalin',
		'tgl',
		//'keterangan',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
