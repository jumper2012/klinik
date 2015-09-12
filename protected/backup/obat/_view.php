<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_obat),array('view','id'=>$data->id_obat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hargabeli')); ?>:</b>
	<?php echo CHtml::encode($data->hargabeli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hargajual')); ?>:</b>
	<?php echo CHtml::encode($data->hargajual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_kadaluarsa')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_kadaluarsa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan_brg')); ?>:</b>
	<?php echo CHtml::encode($data->satuan_brg); ?>
	<br />


</div>