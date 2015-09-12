<?php

$this->menu=array(
array('label'=>'List Tbersalin','url'=>array('index')),
array('label'=>'Manage Tbersalin','url'=>array('admin')),
);
?>

<h1>Buat Rekam Bersalin</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>