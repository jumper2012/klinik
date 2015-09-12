<table width="100%">
    <tr>
        <td colspan="2">
            <fieldset>
            <h3><center><b>Sort Berdasarkan Tanggal</b></center></h3>
            <?php 
            $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
                'id'=>'Laporan',
                'type'=>'inline',
                'enableAjaxValidation'=>false,
            )); ?>

            <div class="form-actions"><center>
            <?php 
            echo $form->datePickerGroup($model,'tgl',array('widgetOptions'=>array('options' => array(
            'showButtonPanel' => true,
            'format' => 'yyyy-mm-dd',
            'viewformat'=>'yyyy-mm-dd',
            'todayHighlight' => true,
            'todayBtn' => "linked",
        ),'htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
                <?php $this->widget('booster.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'context'=>'primary',
                    'label'=>'Search',
                )); ?></center>
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
            <h3><center>Hasil Pencarian Laporan Tanggal <b><?php echo $tanggal?></b></center></h3>
           <?php
                        $gridDataProvider = new CActiveDataProvider('Laporan', array(
                                    'criteria' => array(
                                    'condition' => "tgl LIKE '$tanggal'",
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
                                array(
                                    'header' => 'Nama',
                                    'value' => '$data->idObat->nama',
                                ),
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
<?php
$result = Yii::app()->db->createCommand("SELECT untung FROM laporan WHERE `tgl`= '$tanggal'")->queryAll();        
//var_dump($result);
$total_untung =0;

foreach ($result as $abcd)
{
    $dummy = $total_untung;
    $total_untung = $dummy+$abcd["untung"];
}
//echo $total_untung;
?>
<br>
<hr>
<h2><left>
   Total Keuntungan : <b>Rp. <?php echo $total_untung?>,00</b>
</left></h2>
