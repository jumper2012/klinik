<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_kartu_usg')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kartu_usg),array('view','id'=>$data->id_kartu_usg)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />


</div>