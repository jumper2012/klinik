<?php
echo CHtml::Button('Cetak Laporan(.pdf)', array('submit' => array('/creategrafik/CetakLaporanPdf', 'tanggal'=>$tanggal)));
?><br>
<table width="100%">
    <tr>
        <td colspan="2">
            <fieldset>
                <h3><center><b>Cari Berdasarkan Tanggal</b></center></h3>
                <?php
                $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                    'id' => 'grafik-grafik-form',
                    'type' => 'inline',
                    'enableAjaxValidation' => false,
                ));
                ?>

                <div class="form-actions"><center>
                        <?php
                        echo $form->datePickerGroup($model, 'tanggal', array('widgetOptions' => array('options' => array(
                                    'showButtonPanel' => true,
                                    'format' => 'yyyy-mm-dd',
                                    'viewformat' => 'yyyy-mm-dd',
                                    'todayHighlight' => true,
                                    'todayBtn' => "linked",
                                ), 'htmlOptions' => array('class' => 'span5', 'maxlength' => 20))));
                        ?>
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
</table>
<?php
$date = $tanggal;
$untung = array();
$nama = array();
$indeksuntung = 0;
$timestamp = strtotime($date);
$orderdate = explode('-', $date);
$month = $orderdate[1];
$tahunbulan = "$orderdate[0]-$orderdate[1]";

if ($month == "01") {
    $month = "January";
} else if ($month == "02") {
    $month = "February";
} else if ($month == "03") {
    $month = "March";
} else if ($month == "04") {
    $month = "April";
} else if ($month == "05") {
    $month = "May";
} else if ($month == "06") {
    $month = "June";
} else if ($month == "07") {
    $month = "July";
} else if ($month == "08") {
    $month = "August";
} else if ($month == "09") {
    $month = "September";
} else if ($month == "10") {
    $month = "October";
} else if ($month == "11") {
    $month = "November";
} else if ($month == "12") {
    $month = "December";
}
$day = idate('d', $timestamp);
$listday = array();
//$tahunbulan=date('Y-m');
for ($i = 0; $i < $day; $i++) {
    $temp = $i + 1;
    if ($temp <= 9) {
        $time = $tahunbulan . "-0" . $temp;
    } else {
        $time = $tahunbulan . "-" . $temp;
    }
    $listWeek[$i] = "Tgl " . $temp;

    $tempuntung = Yii::app()->db->createCommand("SELECT obat.nama, SUM(untung) AS SumTotal FROM laporan INNER JOIN obat ON laporan.id_obat = obat.id_obat
        WHERE laporan.tgl = '$time'"
            )->queryAll();
//    var_dump($tempuntung);
    foreach ($tempuntung as $abc) {
        $untung[$indeksuntung] = (int) $abc['SumTotal'];
        $indeksuntung++;
    }
}
?>

<?php
// Example from the official demo of HighCharts: http://www.highcharts.com/demo/
$this->widget(
        'booster.widgets.TbHighCharts', array(
    'options' => array(
        'title' => array(
            'text' => 'Grafik Bulanan Klinik Elivin',
            'x' => 0 //center
        ),
        'subtitle' => array(
            'text' => 'Bulan : ' . $month,
            'x' - 20
        ),
        'xAxis' => array(
            'categories' => $listWeek,
        ),
        'yAxis' => array(
            'title' => array(
                'text' => 'Rp. ',
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
<br>
<?php
//var_dump($untung);
echo "<br><br><br>";
?>
<fieldset>
    <h2><center><b>Keterangan</b></center></h2>
</fieldset>    
<?php
for ($x = 0; $x < $indeksuntung; $x++) {
    $temp = $x + 1;
    if ($temp <= 9) {
        $time = $tahunbulan . "-0" . $temp;
    } else {
        $time = $tahunbulan . "-" . $temp;
    }

    if ($untung[$x] != 0) {
        $resultofuntung = Yii::app()->db->createCommand("SELECT untung FROM laporan WHERE `tgl`= '$time'")->queryAll();
        $total_untung = 0;

        foreach ($resultofuntung as $abcd) {
            $dummy = $total_untung;
            $total_untung = $dummy + $abcd["untung"];
        }
        ?>
        <hr>
        <h3>Detail Keuntungan Tanggal <b><?php echo $time ?></b></h3>
        <?php
        $gridDataProvider = new CActiveDataProvider('Laporan', array(
            'criteria' => array(
                'condition' => "tgl LIKE '$time'",
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
        );?>
        <h2><left>
       Total Keuntungan : <b>Rp. <?php echo $total_untung?>,00</b>
</left></h2>
<?php
        echo "<br>";
    }
}
?>