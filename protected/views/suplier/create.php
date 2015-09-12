<?php

$this->menu=array(
array('label'=>'List Suplier','url'=>array('index')),
array('label'=>'Manage Suplier','url'=>array('admin')),
);
?>

<h1>Daftar Suplier</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>