<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_list_penjualan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_list_penjualan),array('view','id'=>$data->id_list_penjualan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_obat')); ?>:</b>
	<?php echo CHtml::encode($data->nama_obat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qty')); ?>:</b>
	<?php echo CHtml::encode($data->qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_satuan')); ?>:</b>
	<?php echo CHtml::encode($data->harga_satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_jual')); ?>:</b>
	<?php echo CHtml::encode($data->id_jual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::encode($data->id_obat); ?>
	<br />


</div>