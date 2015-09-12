<?php $this->widget('booster.widgets.TbAlert', array(
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),
        'info', // you don't need to specify full config
        'warning' => array('closeText' => false),
        'error' => array('closeText' => 'AAARGHH!!')
    ),
));?>
<head>
    <style>
        table {
            width:100%;
        }
        table, th, td {
            border: 0px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        table#t01 tr:nth-child(even) {
            background-color: #fff;
        }
        table#t01 tr:nth-child(odd) {
            background-color:#eee;
        }
        table#t01 th	{
            background-color: black;
            color: white;

        }

    </style>
</head>
<body>
<tr><th background-color: blue; text-align: center;><h2><font color="#999999">Pasien <?php echo $model->nama; ?></font></h2><th><tr>
<table>
    <table id="t01">
        <tr>
            <td background-color: #fff>
                <b>Nama</b>
            </td>
            <td background-color: #fff>
                <b>:</b>
            </td>
            <td background-color: #fff>
                <b><?php echo $model->nama ?></b>
            </td>
            <td background-color: white>
                <b>&nbsp</b>
            </td>
            <td >
                <b>Jenis Kelamin</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b><?php echo $model->jenis_kelamin ?></b>
            </td>
        </tr>
        <tr>
            <td >
                <b>Umur</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b>
<?php 
    $dumb =  $model->tanggal_lahir;
    $dummy = explode('-',$dumb);    
    $dob =$dummy[2]."-".$dummy[1]."-".$dummy[0];
    $localtime = getdate();
    //echo $localtime."<br>";
    $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
    $dob_a = explode("-", $dob);
    $today_a = explode("-", $today);
    $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
    $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
    $years = $today_y - $dob_y;
    $months = $today_m - $dob_m;
    if ($today_m.$today_d < $dob_m.$dob_d) 
    {
        $years--;
        $months = 12 + $today_m - $dob_m;
    }

    if ($today_d < $dob_d) 
    {
        $months--;
    }

    $firstMonths=array(1,3,5,7,8,10,12);
    $secondMonths=array(4,6,9,11);
    $thirdMonths=array(2);

    if($today_m - $dob_m == 1) 
    {
        if(in_array($dob_m, $firstMonths)) 
        {
            array_push($firstMonths, 0);
        }
        elseif(in_array($dob_m, $secondMonths)) 
        {
            array_push($secondMonths, 0);
        }elseif(in_array($dob_m, $thirdMonths)) 
        {
            array_push($thirdMonths, 0);
        }
    }
    $tot_month = $months%12;
    $sum_month = $months/12;
    if($sum_month>=1)
    {
        $years =$years+1;
    }
    echo "$years Tahun $tot_month Bulan";
?>
            </b>
            </td>
            <td background-color: white>
                <b>&nbsp</b>
            </td>             
            <td >
                <b>Suku</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b><?php echo $model->suku ?></b>
            </td>
        </tr>
        <tr>
            <td >
                <b>Alamat</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b><?php echo $model->alamat ?></b>
            </td>
            <td background-color: white>
                <b>&nbsp</b>
            </td>             
            <td >
                <b>Agama</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b><?php echo $model->agama ?></b>
            </td>
        </tr>
        <tr>
            <td >
                <b>Pekerjaan</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b><?php echo $model->pekerjaan ?></b>
            </td>
            <td background-color: white>
                <b>&nbsp</b>
            </td>             
            <td >
                <b>No. Telepon</b>
            </td>
            <td>
                <b>:</b>
            </td>
            <td >
                <b><?php echo $model->tel ?></b>
            </td>
        </tr>
    </table>
</table>
<br>

</body>
<?php if(Yii::app()->user->hasFlash('delete')):?>
        <div class="flash-error">
                <?php echo Yii::app()->user->getFlash('delete'); ?>
                <?php
                Yii::app()->clientScript->registerScript(
                'myHideEffect',
                '$(".flash-error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
                CClientScript::POS_READY
);
        ?>
        </div>
<?php endif; ?>

<?php
$data = $model->id_pasien;
if($model->jenis_kelamin =="Perempuan"){
    $this->widget('zii.widgets.jui.CJuiTabs', array(
                    'tabs'=>array(
            'USG' => $this->renderPartial('usg_pasien', $data, true),
            'Bersalin' => $this->renderPartial('bersalin_pasien', $data, true),
            'Rawat Umum' => $this->renderPartial('rawat_umum_pasien', $data, true),
            'Rawat Inap' => $this->renderPartial('rawat_inap_pasien', $data, true),            
                    ),
                    'options'=>array(
                        'collapsible'=>true,
                    ),
                ));

}
else if($model->jenis_kelamin =="Laki - Laki")
{
    $this->widget('zii.widgets.jui.CJuiTabs', array(
                    'tabs'=>array(
            'Rawat Umum' => $this->renderPartial('rawat_umum_pasien', $data, true),
            'Rawat Inap' => $this->renderPartial('rawat_inap_pasien', $data, true),            
                    ),
                    'options'=>array(
                        'collapsible'=>true,
                    ),
                ));
}
?>
