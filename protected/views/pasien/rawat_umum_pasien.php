<?php
$result = Yii::app()->db->createCommand("SELECT id_kru FROM kartu_rawat_umum WHERE `id_pasien`= '$data'")->queryAll();
//var_dump($result);
foreach ($result as $zz) {
    $nomorkartu = $zz['id_kru'];
}

if (sizeof($result) == 0) {
    ?>
    <font color="#999999" size="6">Tidak mempunyai Nomor Kartu</b></font><br><br>
    <?php 
    echo CHtml::Button('Daftar Sebagai Rawat Umum Baru', array('submit' => array('/trawatumum/CreateNotExisting','id'=>$data)));
    ?>
    <?php
} else {
    ?>
    <font color="#999999" size="6">Nomor Kartu <b><?php echo $nomorkartu ?></b></font><hr>
    <font color="#999999" size="4">Daftar Rekam medis Rawat umum Pasien</font>
<?php

$gridDataProvider = new CActiveDataProvider('TrawatUmum', array(
            'criteria' => array(
                'condition' => 'id_kru like "%' . $nomorkartu . '%"',
            ),
        ));
?>

<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'trawatumum-grid',
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
                    'url' => "CHtml::normalizeUrl(array('trawatumum/view','id'=>\$data->id_rawatumum))",
                 ),
                'updateedit' => array(
                    'label' => 'Update',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/create.png',
                    'url' => "CHtml::normalizeUrl(array('trawatumum/update','id'=>\$data->id_rawatumum,'id_pasien'=>$data))",
                 ),
                'deleteedit' => array(
                    'label' => 'Delete',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url' => "CHtml::normalizeUrl(array('trawatumum/delete','id'=>\$data->id_rawatumum,'id_pasien'=>$data))",
                 ),
            ),
        ),),
));
?>
<?php 
     echo CHtml::Button('Tambah Rawat Umum Baru', array('submit' => array('/trawatumum/CreateExisting','id'=>$nomorkartu,'id_pasien'=>$data)));
 }
?>

