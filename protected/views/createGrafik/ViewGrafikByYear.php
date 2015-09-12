<?php
$bersalin = array();
$rawatinap = array();
$rawatumum = array();
$usg = array();
$test = array();
$test[0] = "Pilih Tahun Yang Akan Dicari";
$date= date('Y-m-d');
$orderdate=explode('-',$date);
$year_temp =$orderdate[0];
$x=1;
for($z=2000;$z<=$year_temp;$z++)
{
    $test[$x] = $z;
    $x++;
}
?>
<table width="100%">
    <tr>
        <td colspan="2">
            <fieldset>
            <h3><center><b>Cari Berdasarkan Tahun</b></center></h3>
            <?php 
            $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
                'id'=>'grafik-grafik-form',
                'type'=>'inline',
                'enableAjaxValidation'=>false,
            )); ?>

            <div class="form-actions"><center>
            <?php 
             echo $form->dropDownListGroup(
			$model,
			'tanggal',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-7',
				),
				'widgetOptions' => array(
					'data' => $test,
					'htmlOptions' => array(),
				)
			)
		); ?>
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

$indeksbersalin= 0;
$indeksrawatumum= 0;
$indeksrawatinap= 0;
$indeksusg= 0;
$listday = array();
for ($i = 0; $i < 12; $i++) {
    $temp = $i + 1;
        if($temp<=9)
    {
        $time=$year."-0".$temp;
    }
    else
    {
        $time=$year."-".$temp;
    }
    $listMonth[$i] = "Bulan " . $temp;

    $tempcountbersalin = Yii::app()->db->createCommand("SELECT COUNT(*) FROM tbersalin
        WHERE tgl LIKE '$time%'")->queryAll();
    
    foreach ($tempcountbersalin as $abc) 
    {
      $bersalin[$indeksbersalin] = (int) $abc['COUNT(*)'];
      $indeksbersalin++;
    }


    $tempcountusg = Yii::app()->db->createCommand("SELECT COUNT(*) FROM tusg
        WHERE tgl LIKE '$time%'")->queryAll();
            
    foreach ($tempcountusg as $iop) 
    {
      $usg[$indeksusg] = (int) $iop['COUNT(*)'];
      $indeksusg++;
    }    
    
    $tempcountrawatumum = Yii::app()->db->createCommand("SELECT COUNT(*) FROM trawat_umum
        WHERE tgl LIKE '$time%'"
            )->queryAll();
    
    foreach ($tempcountrawatumum as $def) 
    {
      $rawatumum[$indeksrawatumum] = (int) $def['COUNT(*)'];
      $indeksrawatumum++;
    }
    $tempcountrawatinap = Yii::app()->db->createCommand("SELECT COUNT(*) FROM trawat_inap
        WHERE tgl LIKE '$time%'"
            )->queryAll();
    
    foreach ($tempcountrawatinap as $efg) 
    {
      $rawatinap[$indeksrawatinap] = (int) $efg['COUNT(*)'];
      $indeksrawatinap++;
    }
    
}
?>

<?php // Example from the official demo of HighCharts: http://www.highcharts.com/demo/
$this->widget(
    'booster.widgets.TbHighCharts',
    array(
        'options' => array(
            'title' => array(
                'text' => 'Grafik Tahunan Klinik Elivin',
                'x' => 0 //center
            ),
            'subtitle' => array(
                'text' => 'Tahun : '.$year,
                'x' -20
            ),
            'xAxis' => array(
                'categories' => $listMonth,
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
                    'name' => 'Pasien USG',
                    'data' => $usg
                ],                
                [
                    'name' => 'Pasien Rawat Umum',
                    'data' => $rawatumum
                ],
                [
                    'name' => 'Pasien Rawat Inap',
                    'data' => $rawatinap
                ],
                
            )
        ),
        'htmlOptions' => array(
            'style' => 'min-width: 310px; height: 400px; margin: 0 auto'
        )
    )
);
?>
