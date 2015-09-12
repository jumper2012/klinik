<?php
$result = Yii::app()->db->createCommand("SELECT id_kartu_bersalin FROM kartu_bersalin WHERE `id_pasien`= '$data'")->queryAll();
foreach ($result as $zz) {
    $nomorkartu = $zz['id_kartu_bersalin'];
}
if (sizeof($result) == 0) {
    ?>
    <font color="#999999" size="6">Tidak mempunyai Nomor Kartu</b></font><br><br>
    <?php 
    echo CHtml::Button('Daftar Sebagai Rawat Bersalin Baru', array('submit' => array('/tbersalin/CreateNotExisting','id'=>$data)));
    ?>
    <?php
} else {
    ?>
    <font color="#999999" size="6">Nomor Kartu <b><?php echo $nomorkartu ?></b></font><hr>
    <font color="#999999" size="4">Daftar Rekam medis Rawat Bersalin Pasien</font>
<?php

$gridDataProvider = new CActiveDataProvider('Tbersalin', array(
            'criteria' => array(
                'condition' => 'id_kartu_bersalin like "%' . $nomorkartu . '%"',
            ),
        ));
?>

<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'tbersalin-grid',
    'dataProvider' => $gridDataProvider,
//'filter'=>$dataProvider,
    'columns' => array(
          'tgl',
          //'keterangan',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{viewedit}{updateedit}{deleteedit}',
            'buttons' => array(
                'viewedit' => array(
                    'label' => 'View',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url' => "CHtml::normalizeUrl(array('tbersalin/view','id'=>\$data->id_bersalin))",
                 ),
                'updateedit' => array(
                    'label' => 'Update',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/create.png',
                    'url' => "CHtml::normalizeUrl(array('tbersalin/update','id'=>\$data->id_bersalin,'id_pasien'=>$data))",
                 ),
                'deleteedit' => array(
                    'label' => 'Delete',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url' => "CHtml::normalizeUrl(array('tbersalin/delete','id'=>\$data->id_bersalin,'id_pasien'=>$data))",
                 ),
            ),
        ),),
));
?>
<?php 
     echo CHtml::Button('Tambah Rawat Bersalin Baru', array('submit' => array('/tbersalin/CreateExisting','id'=>$nomorkartu,'id_pasien'=>$data)));
 }
?>

