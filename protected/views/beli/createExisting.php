<?php

$this->menu=array(
array('label'=>'List Beli','url'=>array('index')),
array('label'=>'Manage Beli','url'=>array('admin')),
);
?>

<h1>Penjualan Obat</h1>

<?php echo $this->renderPartial('pembelianExisting', array('model'=>$model,'model2'=>$model2,'id'=>$id)); ?>