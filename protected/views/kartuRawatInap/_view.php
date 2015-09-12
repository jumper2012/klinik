<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_kri')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kri),array('view','id'=>$data->id_kri)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />


</div>