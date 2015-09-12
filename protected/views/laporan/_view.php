<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_laporan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_laporan),array('view','id'=>$data->id_laporan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('masuk')); ?>:</b>
	<?php echo CHtml::encode($data->masuk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keluar')); ?>:</b>
	<?php echo CHtml::encode($data->keluar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sisa')); ?>:</b>
	<?php echo CHtml::encode($data->sisa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('untung')); ?>:</b>
	<?php echo CHtml::encode($data->untung); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::encode($data->id_obat); ?>
	<br />

	*/ ?>

</div>