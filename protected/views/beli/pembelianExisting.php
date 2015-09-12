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
<hr>
<center><h2>List Barang Pembelian</h2></center>
<?php
$gridDataProvider = new CActiveDataProvider('ListPenjualan', array(
            'criteria' => array(
                'condition' => 'id_jual like "%' . $id . '%"',
            ),
        ));
?>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'list-penjualan-grid',
    'dataProvider' => $gridDataProvider,
    'emptyText' => 'Belum ada barang yang dimasukkan',
//'filter'=>$model,
    'columns' => array(
        //'id_list_penjualan',
        array(
            'header' => 'No',
            'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
        ),
        'nama_obat',
        'qty',
        'harga_satuan',
        'total',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{updateedit}{deleteedit}',
            'buttons' => array(
                'updateedit' => array(
                    'label' => 'Update',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/create.png',
                    'url' => "CHtml::normalizeUrl(array('ListPenjualan/update','id'=>\$data->id_list_penjualan))",
                ),
                'deleteedit' => array(
                    'label' => 'Delete',
                    'imageUrl' => Yii::app()->request->baseUrl . '/images/delete.png',
                    'url' => "CHtml::normalizeUrl(array('ListPenjualan/delete','id'=>\$data->id_list_penjualan,'id_penjualan'=>$id))",
                ),
            ),
        ),
    ),
));
?>
<?php
    $result = Yii::app()->db->createCommand("SELECT total FROM list_penjualan WHERE `id_jual`= '$id'")->queryAll();
    //var_dump($result);
    $temp_count = 0;
    foreach ($result as $zz) {
        $temp_count = $temp_count + $zz['total'];
    }

?>
<hr>
<h3><B>Total yang harus dibayar : Rp <i><?php echo $temp_count?> ,-</i></B></h3>
<h1><left>
<?php
   echo CHtml::Button('Submit Pembelian', array('submit' => array('/beli/sukses','id'=>$id)));
?>
    </left></h1>