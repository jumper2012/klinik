<?php if(Yii::app()->user->hasFlash('pembelian')):?>
        <div class="flash-error">
                <?php echo Yii::app()->user->getFlash('pembelian'); ?>
                <?php
                Yii::app()->clientScript->registerScript(
                'myHideEffect',
                '$(".flash-error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
                CClientScript::POS_READY
);
        ?>
        </div>
<?php endif; ?>
<?php

$this->menu=array(
array('label'=>'List Beli','url'=>array('index')),
array('label'=>'Manage Beli','url'=>array('admin')),
);
?>

<h1>Penjualan Obat</h1>

<?php echo $this->renderPartial('pembelian', array('model'=>$model,'model2'=>$model2,)); ?>