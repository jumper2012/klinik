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
            $nama = CHtml::listData(DummyListObat::model()->findAll(), 'id_obat', 'nama');
            ?><br><br>
            <?php
            echo $form->textFieldGroup(
                    $model, 'nama_obat', array(
                'labelOptions' => array('label' => false),        
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'htmlOptions' => array('disabled' => true)
                )
                    )
            );
            ?>
            <?php
            $result = Yii::app()->db->createCommand("SELECT jumlah FROM obat WHERE `id_obat`= '$model->id_obat'")->queryAll();
            $ketersediaan = $result["0"]["jumlah"];
            
            $list = array();
            for($a=1;$a<=$ketersediaan;$a++)
            {
                $list[$a]=$a;
            }
            
            ?>
            <font size="4"><b>Banyak Obat&nbsp&nbsp&nbsp</b><br></font>
            <?php
            echo $form->dropDownListGroup(
                    $model, 'qty', array(
                'style' => 'width:55px',   
                'wrapperHtmlOptions' => array(
                    'class' => 'span5',
                ),        
                'widgetOptions' => array(
                    'data' => $list,
                    'htmlOptions' => array(
                        'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('ListPenjualan/SelectHarga'),
            'update' => '#kode',
          )
                    ),
                )
                    )
            );
        $result = Yii::app()->db->createCommand("SELECT hargajual FROM obat WHERE `id_obat`= '$model->id_obat'")->queryAll();
        $harga = $result["0"]["hargajual"];
        $totalpembayaran = $harga * $model->qty;

            ?>
        </TD>
        <td width="" rowspan="2" bgcolor="#eee" >

        </td>    
        <td rowspan="2" width="65%">
            <div id="kode" class="alert alert-info">
                        <FONT SIZE="5"><B>Harga persatuan : Rp <?php echo $harga;?> ,- &nbspX <?php echo $model->qty;?><br><br>
        Total Harga    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : Rp <?php echo $totalpembayaran;?> ,-</B>
        </FONT>
            </div>
        </td>    
    </TR>
    <TR>
        <TD>    <?php echo $form->hiddenField($model, 'id_obat'); ?>

<?php
$this->widget(
        'booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' => 'Simpan ke daftar belanja'
        )
);
?>
        </TD>    
    </TR>
</table>
<BR>
<?php // / echo $form->error($model2, 'jumlah'); ?>
<?php $this->endWidget(); ?>
<?php ?>