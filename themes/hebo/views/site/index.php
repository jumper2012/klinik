<?php $date = date('Y-m-d'); ?>
<div class="shout-box">
    <div class="shout-text">
        <h2>Sistem Informasi Klinik Elivin</h2>
    </div>
</div>
<table width="100%">
    <tr>
        <td width="30%" valign="top">
            <h3><center><b>Choose Date of Attendence Patient</b></center></h3><hr>        
            <?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>
    <hr>
    <br>
    <center>
            <form action="" method="post" name="postform" >
                <div class="asd">
                    <label for="backup"><h2><b>Backup Database</b></h2></label>
                    <br>
                    <input type="submit" name="backup" value="Proses Backup" />
            </form>
    </center>

    <?php
    include "backup.php";
    $database = 'Backup';
    $file = $database . '_' . date("D, d-M-Y") . '_' . time() . '.sql';
//Backup database
    if (isset($_POST['backup'])) {
        // Backup Semua Tabel
        backup("localhost", "root", "", "klinik", $file, "*");
        // Backup Hanya Tabel Tertentu
        //backup("localhost","user_database","pass_database","nama_database",$file,"tabel1,tabel2,tabel3");
        echo 'Backup database telah selesai <a style="cursor:pointer" href="?nama_file=' . $file . '" title="Download">Download file database</a>';
        echo "<pre>";
        echo "</pre>";
    } else {
        unset($_POST['backup']);
    }
    ?>

</td>
<td><br>
<center><h3><font size="6">Daftar Pasien Tanggal 
    <?php 
    $timestamp = strtotime($date);
    $bulan = date('M', $timestamp);
    $orderdate = explode('-', $date);    
    ?><b><i><?php echo $orderdate[2]." ".$bulan." ".$orderdate[0];?></i></b><?php 
    ?></font></h3></center><hr>
<?php $collapse = $this->beginWidget('ext.booster.widgets.TbCollapse'); ?>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="">
                    Pasien Rawat Umum
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">

                <?php
                $gridDataProvider = new CActiveDataProvider('TrawatUmum', array(
                    'criteria' => array(
                        'join' => "JOIN kartu_rawat_umum dj ON t.id_kru = dj.id_kru JOIN pasien mj ON dj.id_pasien = mj.id_pasien",
                        'condition' => "tgl LIKE '$date'",
                    ),
                ));
                $this->widget(
                        'booster.widgets.TbGridView', array(
                    'dataProvider' => $gridDataProvider,
                    'emptyText' => 'Tidak ada pasien datang :)',
                    'template' => "{items}",
                    'columns' => array(
                        array(
                            'header' => 'No',
                            'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
                        ),
                        array(
                            'header' => 'Nama',
                            'value' => '$data->idKru->idPasien->nama',
                        ),
                        array(
                            'header' => 'Alamat',
                            'value' => '$data->idKru->idPasien->alamat',
                        ),
                        array(
                            'header' => 'No kontak',
                            'value' => '$data->idKru->idPasien->tel',
                        ),
                        array(
                            'header' => 'Aksi',
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{view}',
                            'viewButtonUrl' => 'Yii::app()->createUrl(\'pasien/view\',array(\'id\'=>\'\'.$data->idKru->idPasien->id_pasien.\'\'))',
                        ),
                    ),
                        )
                );
                ?></div></div></div></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="">
                    Pasien Rawat Bersalin
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">

                <?php
                $gridDataProvider = new CActiveDataProvider('Tbersalin', array(
                    'criteria' => array(
                        'join' => "JOIN kartu_bersalin dj ON t.id_kartu_bersalin = dj.id_kartu_bersalin JOIN pasien mj ON dj.id_pasien = mj.id_pasien",
                        'condition' => "tgl LIKE '$date'",
                    ),
                ));
                $this->widget(
                        'booster.widgets.TbGridView', array(
                    'dataProvider' => $gridDataProvider,
                    'emptyText' => 'Tidak ada pasien datang :)',
                    'template' => "{items}",
                    'columns' => array(
                        array(
                            'header' => 'No',
                            'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
                        ),
                        array(
                            'header' => 'Nama',
                            'value' => '$data->idKartuBersalin->idPasien->nama',
                        ),
                        array(
                            'header' => 'Alamat',
                            'value' => '$data->idKartuBersalin->idPasien->alamat',
                        ),
                        array(
                            'header' => 'No kontak',
                            'value' => '$data->idKartuBersalin->idPasien->tel',
                        ),
                        array(
                            'header' => 'Aksi',
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{view}',
                            'viewButtonUrl' => 'Yii::app()->createUrl(\'pasien/view\',array(\'id\'=>\'\'.$data->idKartuBersalin->idPasien->id_pasien.\'\'))',
                        ),
                    ),
                        )
                );
                ?></div></div></div></div>        
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="">
                    Pasien USG
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">

                <?php
                $gridDataProvider = new CActiveDataProvider('Tusg', array(
                    'criteria' => array(
                        'join' => "JOIN kartu_usg dj ON t.id_kartu_usg = dj.id_kartu_usg JOIN pasien mj ON dj.id_pasien = mj.id_pasien",
                        'condition' => "tgl LIKE '$date'",
                    ),
                ));
                $this->widget(
                        'booster.widgets.TbGridView', array(
                    'dataProvider' => $gridDataProvider,
                    'emptyText' => 'Tidak ada pasien datang :)',
                    'template' => "{items}",
                    'columns' => array(
                        array(
                            'header' => 'No',
                            'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
                        ),
                        array(
                            'header' => 'Nama',
                            'value' => '$data->idKartuUsg->idPasien->nama',
                        ),
                        array(
                            'header' => 'Alamat',
                            'value' => '$data->idKartuUsg->idPasien->alamat',
                        ),
                        array(
                            'header' => 'No kontak',
                            'value' => '$data->idKartuUsg->idPasien->tel',
                        ),
                        array(
                            'header' => 'Aksi',
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{view}',
                            'viewButtonUrl' => 'Yii::app()->createUrl(\'pasien/view\',array(\'id\'=>\'\'.$data->idKartuUsg->idPasien->id_pasien.\'\'))',
                        ),
                    ),
                        )
                );
                ?></div></div></div></div>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="">
                    Pasien Rawat Inap
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">

                <?php
                $gridDataProvider = new CActiveDataProvider('Trawatinap', array(
                    'criteria' => array(
                        'join' => "JOIN kartu_rawat_inap dj ON t.id_kri = dj.id_kri JOIN pasien mj ON dj.id_pasien = mj.id_pasien",
                        'condition' => "tgl LIKE '$date'",
                    ),
                ));
                $this->widget(
                        'booster.widgets.TbGridView', array(
                    'dataProvider' => $gridDataProvider,
                    'emptyText' => 'Tidak ada pasien datang :)',
                    'template' => "{items}",
                    'columns' => array(
                        array(
                            'header' => 'No',
                            'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
                        ),
                        array(
                            'header' => 'Nama',
                            'value' => '$data->idKri->idPasien->nama',
                        ),
                        array(
                            'header' => 'Alamat',
                            'value' => '$data->idKri->idPasien->alamat',
                        ),
                        array(
                            'header' => 'No kontak',
                            'value' => '$data->idKri->idPasien->tel',
                        ),
                        array(
                            'header' => 'Aksi',
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{view}',
                            'viewButtonUrl' => 'Yii::app()->createUrl(\'pasien/view\',array(\'id\'=>\'\'.$data->idKri->idPasien->id_pasien.\'\'))',
                        ),
                    ),
                        )
                );
                ?></div></div></div></div>        

<?php $this->endWidget(); ?>
</td>
</tr>

</table>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>

<script type="text/javascript">
    $(function () {
        $('#slider-nivo').nivoSlider({
            effect: 'boxRandom',
            manualAdvance: false,
            controlNav: false
        });
    });

