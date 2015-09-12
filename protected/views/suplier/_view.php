<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_suplier')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_suplier),array('view','id'=>$data->id_suplier)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->nama_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_tel')); ?>:</b>
	<?php echo CHtml::encode($data->no_tel); ?>
	<br />


</div>