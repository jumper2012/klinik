<table width="100%">
    <tr>
        <td colspan="2">
            <fieldset>
            <h3><center><b>Cari Berdasarkan Bulan</b></center></h3>
            <?php 
            $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
                'id'=>'pasien-form',
                'type'=>'inline',
                'enableAjaxValidation'=>false,
            )); ?>

            <div class="form-actions"><center>
            <?php 
            echo $form->datePickerGroup($model,'umur',array('widgetOptions'=>array('options' => array(
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
</table>
<?php
 var_dump($tanggal);
$date = $tanggal;
$bersalin = array();
$rawatumum = array();
$indeksbersalin= 0;
$indeksrawatumum= 0;
$timestamp = strtotime($date);
$month=date('M');
$day = idate('d', $timestamp);
$listday = array();
$tahunbulan=date('Y-m');
for ($i = 0; $i < $day; $i++) {
    $temp = $i + 1;
        if($temp<=9)
    {
        $time=$tahunbulan."-0".$temp;
    }
    else
    {
        $time=$tahunbulan."-".$temp;
    }
    $listWeek[$i] = "Tgl " . $temp;

    $tempcountbersalin = Yii::app()->db->createCommand("SELECT COUNT(*) FROM tbersalin
        WHERE tgl = '$time'"
            )->queryAll();
    
    foreach ($tempcountbersalin as $abc) 
    {
      $bersalin[$indeksbersalin] = (int) $abc['COUNT(*)'];
      $indeksbersalin++;
    }
    
    $tempcountrawatumum = Yii::app()->db->createCommand("SELECT COUNT(*) FROM trawat_umum
        WHERE tgl = '$time'"
            )->queryAll();
    
    foreach ($tempcountrawatumum as $def) 
    {
      $rawatumum[$indeksrawatumum] = (int) $def['COUNT(*)'];
      $indeksrawatumum++;
    }
//    var_dump($rawatumum);
//    var_dump($bersalin);
}
?>

<?php // Example from the official demo of HighCharts: http://www.highcharts.com/demo/
$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array(
                'text' => 'Grafik Bulanan Klinik Elivin',
                'x' => 0 //center
            ),
            'subtitle' => array(
                'text' => 'Bulan : '.$month,
                'x' -20
            ),
            'xAxis' => array(
                'categories' => $listWeek,
            ),
            'yAxis' => array(
                'title' => array(
                    'text' =>  'Banyak Pasien',
                ),
                'plotLines' => [
                    [
                        'value' => 0,
                        'width' => 1,
                        'color' => '#808080'
                    ]
                ],
            ),
            'tooltip' => array(
                'valueSuffix' => ' Orang'
            ),
            'legend' => array(
                'layout' => 'vertical',
                'align' => 'right',
                'verticalAlign' => 'middle',
                'borderWidth' => 0
            ),
            'series' => array(
                [
                    'name' => 'Pasien Bersalin',
                    'data' => $bersalin
                ],
                [
                    'name' => 'Pasien Rawat Umum',
                    'data' => $rawatumum
                ],
            )
        ),
        'htmlOptions' => array(
            'style' => 'min-width: 310px; height: 400px; margin: 0 auto'
        )
    )
);
?>


