<?php
$this->menu = array(
    array('label' => 'List Pasien', 'url' => array('index')),
    array('label' => 'Create Pasien', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('pasien-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<table width='100%'>
    <tr>
        <td width="80%">
            <h1><center>Daftar Pasien </center></h1>
        </td>
        <td align="center">
            <?php
            echo CHtml::Button('Buat Daftar Pasien Baru', array('submit' => array('/pasien/create')));
            ?>
        </td>
    </tr>
</table>
<hr>
<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>    
</div><!-- search-form -->
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'pasien-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'emptyText' => 'Tidak ada laporan :)',
    'template' => "{summary}{items}{pager}",
    'enablePagination' => true,
    'columns' => array(
        //'id_pasien',
        'nama',
        //'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'jenis_kelamin',
        //'suku',
        'agama',
        'tel',
        //*/
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{usg}',
            'buttons' => array(
                'usg' => array(
                    'label' => 'Lihat Profil',
                    'url' => "CHtml::normalizeUrl(array('pasien/view','id'=>\$data->id_pasien))",
                //'url'=>"CHtml::normalizeUrl(array('usg/ViewUSG','id'=>\$data->id_pasien))",
                ),
            ),
        ),
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update},{delete}',
        ),
    ),
));
?>
