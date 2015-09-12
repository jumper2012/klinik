<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_jual')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jual),array('view','id'=>$data->id_jual)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgltrans')); ?>:</b>
	<?php echo CHtml::encode($data->tgltrans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_resep')); ?>:</b>
	<?php echo CHtml::encode($data->no_resep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distributor')); ?>:</b>
	<?php echo CHtml::encode($data->distributor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_batch')); ?>:</b>
	<?php echo CHtml::encode($data->no_batch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ed')); ?>:</b>
	<?php echo CHtml::encode($data->ed); ?>
	<br />


</div>