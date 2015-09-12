<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_rekammedis')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rekammedis),array('view','id'=>$data->id_rekammedis)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kartu_usg')); ?>:</b>
	<?php echo CHtml::encode($data->id_kartu_usg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kru')); ?>:</b>
	<?php echo CHtml::encode($data->id_kru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kartu_bersalin')); ?>:</b>
	<?php echo CHtml::encode($data->id_kartu_bersalin); ?>
	<br />


</div>