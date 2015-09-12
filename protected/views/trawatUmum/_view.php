<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_rawatumum')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rawatumum),array('view','id'=>$data->id_rawatumum)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kru')); ?>:</b>
	<?php echo CHtml::encode($data->id_kru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('historia_morbi')); ?>:</b>
	<?php echo CHtml::encode($data->historia_morbi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('terapi')); ?>:</b>
	<?php echo CHtml::encode($data->terapi); ?>
	<br />


</div>