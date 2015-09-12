<?php

$this->menu=array(
array('label'=>'List Tusg','url'=>array('index')),
array('label'=>'Create Tusg','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tusg-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center><h1>Rawat USG</h1></center>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tusg-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_usg',
		'id_kartu_usg',
		'nama_suami',
		'grafida',
		'hpht',
		'ttp',
		/*
		'td_bb',
		'keluhan',
		'usia_kehaliman',
		'terapi',
		'keterangan',
		'tgl',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
