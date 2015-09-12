<?php
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

$indeksuntung= 0;
$untung=array();
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

    $tempuntung = Yii::app()->db->createCommand("SELECT obat.nama, SUM(untung) AS SumTotal FROM laporan INNER JOIN obat ON laporan.id_obat = obat.id_obat
        WHERE laporan.tgl LIKE '$time%'"
            )->queryAll();
   //var_dump($tempuntung);
    foreach ($tempuntung as $abc) {
        $untung[$indeksuntung] = (int) $abc['SumTotal'];
        $indeksuntung++;
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
                    'text' =>  'Rp. ',
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
                'valueSuffix' => ' Rupiah'
            ),
            'legend' => array(
                'layout' => 'vertical',
                'align' => 'right',
                'verticalAlign' => 'middle',
                'borderWidth' => 0
            ),
            'series' => array(
                [
                    'name' => 'Keuntungan',
                    'data' => $untung
                ],
            )
        ),
        'htmlOptions' => array(
            'style' => 'min-width: 310px; height: 400px; margin: 0 auto'
        )
    )
);
?>

