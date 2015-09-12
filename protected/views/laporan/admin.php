<h1>Laporan</h1>
<?php
    $data = date('Y-m-d');
    //echo $test;
    $this->widget('zii.widgets.jui.CJuiTabs', array(
                    //'type' => 'tabs',
                    'tabs'=>array(
            'Laporan berdasarkan Obat' => $this->renderPartial('LaporanObat',$data,true),
            'Laporan berdasarkan Waktu' => $this->renderPartial('LaporanWaktu',$data,true),
            //'Rawat Umum' => $this->renderPartial('rawat_umum_pasien', $data, true),        
                    ),
                    'options'=>array(
                        'collapsible'=>true,
                    ),
                ));
?>
