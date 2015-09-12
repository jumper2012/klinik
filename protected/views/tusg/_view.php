<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_usg')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usg),array('view','id'=>$data->id_usg)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kartu_usg')); ?>:</b>
	<?php echo CHtml::encode($data->id_kartu_usg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_suami')); ?>:</b>
	<?php echo CHtml::encode($data->nama_suami); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grafida')); ?>:</b>
	<?php echo CHtml::encode($data->grafida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hpht')); ?>:</b>
	<?php echo CHtml::encode($data->hpht); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ttp')); ?>:</b>
	<?php echo CHtml::encode($data->ttp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('td_bb')); ?>:</b>
	<?php echo CHtml::encode($data->td_bb); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('keluhan')); ?>:</b>
	<?php echo CHtml::encode($data->keluhan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usia_kehaliman')); ?>:</b>
	<?php echo CHtml::encode($data->usia_kehaliman); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terapi')); ?>:</b>
	<?php echo CHtml::encode($data->terapi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl); ?>
	<br />

	*/ ?>

</div>