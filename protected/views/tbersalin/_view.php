<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_bersalin')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bersalin),array('view','id'=>$data->id_bersalin)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kartu_bersalin')); ?>:</b>
	<?php echo CHtml::encode($data->id_kartu_bersalin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>