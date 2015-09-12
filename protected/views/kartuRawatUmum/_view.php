<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_kru')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kru),array('view','id'=>$data->id_kru)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />


</div>