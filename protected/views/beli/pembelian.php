<?php
$form = $this->beginWidget(
        'booster.widgets.TbActiveForm', array(
    'id' => 'verticalForm',
    'htmlOptions' => array('class' => 'well'), // for inset effect
        )
);
?>
<table WIDTH="100%" >
    <TR>
        <TD width="45%" valign="center">
            <font size="4"><b>Nama Obat&nbsp</b></font>
            <?php echo $form->errorSummary($model); ?>
            <?php
            $nama = CHtml::listData(Obat::model()->findAll(), 'id_obat', 'nama');
            //var_dump($nama);
            
            ?>
            <?php
            $this->widget('ext.select2.ESelect2', array(
                'model' => $model2,
                'attribute' => 'id_obat',
//                'name' => 'selectInput',
                'data' => $nama,
                'htmlOptions' => array(
//                'wrapperHtmlOptions' => array(
//                    'class' => 'col-sm-5',
//                ),
                    'style' => 'width:330px',
                    'prompt' => '-- Pilih Obat --',
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Beli/SelectKetersedian'),
                        'class' => 'span5',
                        'update' => '#' . CHtml::activeId($model2, 'jumlah'), //jurusan_id = field jurusan_id
                        //'update' => "#kode",
                        'beforeSend' => 'function() {$("#Beli_jumlah").find("option").remove();}',
                    )
                ),)
            );
            ?>
            <br>
            <font size="4"><b>Banyak Obat&nbsp&nbsp&nbsp</b><br></font>
            <?php
            echo $form->dropDownList($model2, 'jumlah', (!$model->isNewRecord) ? $model2->jumlah() : array(), //kalau action update, maka akan muncul data dari database, yang dicari oleh fungsi jurusanList di model Profil
                    array(
                'style' => 'width:55px',
                'prompt' => '0',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('Beli/SelectHarga'),
                    'class' => 'span5',
                    //'update' => '#' . CHtml::activeId($model2, 'jumlah'), //jurusan_id = field jurusan_id
                    'update' => "#kode",
                //'beforeSend' => 'function() {$("#Harga").find("option").remove();}',
                    ))
            );
            ?>
        </TD>
        <td width="" rowspan="2" bgcolor="#eee" >

        </td>    
        <td rowspan="2" width="65%">
            <div id="kode" class="alert alert-info"></div>
        </td>    
    </TR>
    <TR>
        <TD>
            <?php
            $this->widget(
                    'booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => 'Tambahkan ke daftar belanja'
                    )
            );
            ?>
        </TD>    
    </TR>
</table>
<BR>
<?php echo $form->error($model2, 'jumlah'); ?>
<?php $this->endWidget(); ?>
