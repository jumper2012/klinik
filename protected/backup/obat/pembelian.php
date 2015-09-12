<?php
//$this->breadcrumbs = array(
//    'Obats' => array('index'),
//    'Manage',
//);

$this->menu = array(
    array('label' => 'List Obat', 'url' => array('index')),
    array('label' => 'Create Obat', 'url' => array('create')),
);
?>

<h1>Obat Pembelian</h1>

<p> 
    Klik button <b>"Beli Untuk Obat Baru"</b> untuk mendaftarkan obat baru ke dalam inventori apotik
</p>
<?php
echo CHtml::Button('Beli Untuk Obat Baru', array('submit' => array('/obat/Create')));
?>
<?php // echo CHtml::link('Beli Untuk Obat Baru','#',array('class'=>'search-button btn')); ?>

</div><!-- search-form -->
<hr>
<h3><center>Inventori Apotik</h3>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'obat-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id_obat',
        'nama',
        'jumlah',
        'hargabeli',
        'hargajual',
        'tgl_kadaluarsa',
        /*
          'satuan_brg',
         */
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{usg}',
            'buttons' => array(
                'usg' => array(
                    'label' => 'Lakukan Pembelian',
                    'url' => "CHtml::normalizeUrl(array('obat/update','id'=>\$data->id_obat))",
                //'url'=>"CHtml::normalizeUrl(array('usg/ViewUSG','id'=>\$data->id_pasien))",
                ),
            ),
        ),
    ),
));
?>
