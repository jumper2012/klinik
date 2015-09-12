<?php

$this->menu=array(
array('label'=>'List TrawatUmum','url'=>array('index')),
array('label'=>'Manage TrawatUmum','url'=>array('admin')),
);
?>

<h1>Buat Rekam Rawat Inap</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

