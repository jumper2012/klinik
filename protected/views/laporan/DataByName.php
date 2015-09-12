<?php
$nama = CHtml::listData(Obat::model()->findAll(), 'id_obat', 'nama');
?>

<table width="100%">
    <tr>
        <td colspan="2">
            <fieldset>
                <h3><center><b>Sort Berdasarkan Tanggal</b></center></h3>
                <?php
                $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                    'id' => 'Laporan',
                    'type' => 'inline',
                    'enableAjaxValidation' => false,
                        ));
                ?>

                <div class="form-actions"><center>
                        <?php
                        $this->widget('ext.select2.ESelect2', array(
                            'model' => $model,
                            'attribute' => 'id_obat',
                            'data' => $nama,
                            'htmlOptions' => array(
                                'style' => 'width:330px',
                                'prompt' => '-- Pilih Obat --',
                            ),)
                        );
                        ?>
                        &nbsp;
                        <?php
                        $this->widget('booster.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'context' => 'primary',
                            'label' => 'Search',
                        ));
                        ?></center>
                </div>
<?php $this->endWidget(); ?>
            </fieldset>
        </td>
    </tr>
    <tr><td>
            <hr>
        </td>
    </tr>        
</td>   
<td colspan="2" align="center" valign="middle">
    <?php
      if($id==0)
      {
       ?>
            <h3><center>Belum Memasukkan Nama Obat</b></center></h3>
       <?php     
      }


      else{ 
      $result = Yii::app()->db->createCommand("SELECT nama FROM obat WHERE `id_obat`= '$id'")->queryAll();

    foreach ($result as $zz) {
        $nama = $zz['nama'];
    }
//      var_dump($nama);
          ?>
    <h3><center>Hasil Pencarian Laporan Obat <b><?php echo $nama ?></b></center></h3>
    <?php }
    $gridDataProvider = new CActiveDataProvider('Laporan', array(
                'criteria' => array(
                    'condition' => "id_obat LIKE '$id'",
                ),
            ));
    $this->widget(
            'booster.widgets.TbGridView', array(
        'dataProvider' => $gridDataProvider,
        'emptyText' => 'Tidak ada laporan :)',
                            'template' => "{summary}{items}{pager}",
                            'enablePagination'=>true,    
        'columns' => array(
            array(
                'header' => 'No',
                'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
            ),
            'tgl',
            'masuk',
            'keluar',
            'sisa',
            'untung',
            'keterangan',
        ),
            )
    );
    ?>            
</td>
</tr>
</table>