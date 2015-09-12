<?php
$result = Yii::app()->db->createCommand("SELECT id_kri FROM kartu_rawat_inap WHERE `id_pasien`= '$data'")->queryAll();
//var_dump($result);
foreach ($result as $zz) {
    $nomorkartu = $zz['id_kri'];
}

if (sizeof($result) == 0) {
    ?>
    <font color="#999999" size="6">Tidak mempunyai Nomor Kartu</b></font><br><br>
    <?php 
    echo CHtml::Button('Daftar Sebagai Rawat Inap Baru', array('submit' => array('/trawatinap/CreateNotExisting','id'=>$data)));
    ?>
    <?php
} else {
    ?>
    <font color="#999999" size="6">Nomor Kartu <b><?php echo $nomorkartu ?></b></font><hr>
    <font color="#999999" size="4">Daftar Rekam medis Rawat Inap Pasien</font>
<?php

$gridDataProvider = new CActiveDataProvider('Trawatinap', array(
            'criteria' => array(
                'condition' => 'id_kri like "%' . $nomorkartu . '%"',
            ),
        ));
?>

<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'trawatinap-grid',
    'dataProvider' => $gridDataProvider,
//'filter'=>$dataProvider,
    'columns' => array(
          'tgl',
//          'historia_morbi',
//          'terapi',  
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{viewedit}{updateedit}{deleteedit}',
            'buttons' => array(
                'viewedit' => array(
                    'label' => 'View',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url' => "CHtml::normalizeUrl(array('trawatinap/view','id'=>\$data->id_rawat_inap))",
                 ),
                'updateedit' => array(
                    'label' => 'Update',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/create.png',
                    'url' => "CHtml::normalizeUrl(array('trawatinap/update','id'=>\$data->id_rawat_inap,'id_pasien'=>$data))",
                 ),
                'deleteedit' => array(
                    'label' => 'Delete',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url' => "CHtml::normalizeUrl(array('trawatinap/delete','id'=>\$data->id_rawat_inap,'id_pasien'=>$data))",
                 ),
            ),
        ),),
));
?>
<?php 
     echo CHtml::Button('Tambah Rawat Inap Baru', array('submit' => array('/trawatinap/CreateExisting','id'=>$nomorkartu,'id_pasien'=>$data)));
 }
?>

