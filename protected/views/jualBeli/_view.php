<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_jualbeli')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_jualbeli),array('view','id'=>$data->id_jualbeli)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_resep')); ?>:</b>
	<?php echo CHtml::encode($data->no_resep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distributor')); ?>:</b>
	<?php echo CHtml::encode($data->distributor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jlh_beli')); ?>:</b>
	<?php echo CHtml::encode($data->jlh_beli); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jlh_jual')); ?>:</b>
	<?php echo CHtml::encode($data->jlh_jual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_batch')); ?>:</b>
	<?php echo CHtml::encode($data->no_batch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ed')); ?>:</b>
	<?php echo CHtml::encode($data->ed); ?>
	<br />

	*/ ?>

</div>