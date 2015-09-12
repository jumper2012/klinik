<?php
$result = Yii::app()->db->createCommand("SELECT id_kartu_usg FROM kartu_usg WHERE `id_pasien`= '$data'")->queryAll();
//echo sizeof($result);
foreach ($result as $zz) {
    $nomorkartu = $zz['id_kartu_usg'];
}

if (sizeof($result) == 0) {
    ?>
    <font color="#999999" size="6">Tidak mempunyai Nomor Kartu</b></font><br><br>
    <?php 
    echo CHtml::Button('Daftar Sebagai USG Baru', array('submit' => array('/tusg/CreateNotExisting','id'=>$data)));
    ?>
    
    <?php
} else {
    ?>
    <font color="#999999" size="6">Nomor Kartu <b><?php echo $nomorkartu ?></b></font><hr>
    <font color="#999999" size="4">Daftar Rekam medis USG Pasien</font>
    <?php

$gridDataProvider = new CActiveDataProvider('Tusg', array(
            'criteria' => array(
                'condition' => 'id_kartu_usg like "%' . $nomorkartu . '%"',
            ),
        ));
?>

<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'tusg-grid',
    'dataProvider' => $gridDataProvider,
//'filter'=>$dataProvider,
    'columns' => array(
        //'id_usg',
        //'id_kartu_usg',
        'nama_suami',
        'grafida',
        'hpht',
        'ttp',
        
          'td_bb',
         // 'keluhan',
         // 'usia_kehaliman',
          //'terapi',
         // 'keterangan',
        // */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{viewedit}{updateedit}{deleteedit}',
            'buttons' => array(
                'viewedit' => array(
                    'label' => 'View',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
                    'url' => "CHtml::normalizeUrl(array('tusg/view','id'=>\$data->id_usg))",
                 ),
                'updateedit' => array(
                    'label' => 'Update',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/create.png',
                    'url' => "CHtml::normalizeUrl(array('tusg/update','id'=>\$data->id_usg,'id_pasien'=>$data))",
                 ),
                'deleteedit' => array(
                    'label' => 'Delete',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                    'url' => "CHtml::normalizeUrl(array('tusg/delete','id'=>\$data->id_usg,'id_pasien'=>$data))",
                 ),
            ),
        ),),
));
?>
<?php 
     echo CHtml::Button('Tambah USG Baru', array('submit' => array('/tusg/CreateExisting','id'=>$nomorkartu,'id_pasien'=>$data)));
} ?>


