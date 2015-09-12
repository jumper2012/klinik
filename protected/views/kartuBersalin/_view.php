<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_kartu_bersalin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_kartu_bersalin),array('view','id'=>$data->id_kartu_bersalin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />


</div>