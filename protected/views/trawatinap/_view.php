<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_rawat_inap')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rawat_inap),array('view','id'=>$data->id_rawat_inap)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kri')); ?>:</b>
	<?php echo CHtml::encode($data->id_kri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>