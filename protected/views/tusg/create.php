<?php

$this->menu=array(
array('label'=>'List Tusg','url'=>array('index')),
array('label'=>'Manage Tusg','url'=>array('admin')),
);
?>

<h1>Buat Rekam USG</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>