<table width='100%'">
    <tr>
        <td width="25%">

        </td>
        <td width="50%">
            <h1><FONT SIZE="6"><B><u><center>Daftar Pasien</center></u></B></FONT></h1>
        </td>
        <td align="center" width="25%">
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array(
                'label' => 'Buat Daftar Pasien Baru',
                'context' => 'primary',
                'buttonType' => 'link',
                'url' => "index.php?r=pasien/create"
                    )
            );
            //echo CHtml::Button('Buat Daftar Pasien Baru', array('submit' => array('/pasien/create')));
            ?>
        </td>
    </tr>
</table>
<hr>
<center>
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'pasien-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php
    $nama = CHtml::listData(Pasien::model()->findAll(), 'nama', 'nama');


    $this->widget('ext.select2.ESelect2', array(
        'model' => $model,
        'attribute' => 'nama',
        'data' => $nama,
        'htmlOptions' => array(
            'style' => 'width:550px',
            'prompt' => '-- Pilih Nama Pasien --',
        ),)
    );
    ?> &nbsp;
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Search' : 'Save',
    ));
    ?>
    <?php $this->endWidget(); ?>
</center>
<hr>


<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'pasien-grid',
    'dataProvider' => $dataProvider,
    'filter' => $model,
    'emptyText' => 'Tidak ada laporan :)',
    'template' => "{summary}{items}{pager}",
    'enablePagination' => true,
    'columns' => array(
        //'id_pasien',
        'nama',
        //'tanggal_lahir',
        //'suku',
        //'agama',
        //'pekerjaan',
        'alamat',
        'jenis_kelamin',
        'tel',
//        array(
//            'header' => 'No. Kartu R.Umum',
//            'value' => '$data->kartuRawatUmums->trawatUmums->id_kru',
//        ),
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
