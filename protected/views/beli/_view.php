<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_beli')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_beli),array('view','id'=>$data->id_beli)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::encode($data->id_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgltrans')); ?>:</b>
	<?php echo CHtml::encode($data->tgltrans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_faktur')); ?>:</b>
	<?php echo CHtml::encode($data->no_faktur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distributor')); ?>:</b>
	<?php echo CHtml::encode($data->distributor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jlh_beli')); ?>:</b>
	<?php echo CHtml::encode($data->jlh_beli); ?>
	<br />


</div>