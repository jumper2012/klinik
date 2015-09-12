<!--<div class="slider-bootstrap"><!-- start slider 
    <div class="slider-wrapper theme-default">
        <div id="slider-nivo" class="nivoSlider">
            <img src="<?php //echo Yii::app()->theme->baseUrl;                                                                         ?>/img/slider/flickr/s10.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/flickr/s10.jpg" alt="" title="" />
            <img src="<?php //echo Yii::app()->theme->baseUrl;                                                                         ?>/img/slider/flickr/s11.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/flickr/s11.jpg" alt="" title="" />
            <img src="<?php //echo Yii::app()->theme->baseUrl;                                                                         ?>/img/slider/flickr/s12.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/flickr/s12.jpg" alt="" data-transition="slideInLeft"  />
            <img src="<?php //echo Yii::app()->theme->baseUrl;                                                                         ?>/img/slider/flickr/s13.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl; ?>/img/slider/flickr/s13.jpg" alt="" title="" />
        </div>
    </div>

</div> <!-- /slider -->


<div class="shout-box">
    <div class="shout-text">
        <h2>Student Attendance System of IT Del</h2>
    </div>
</div>
<div class="row-fluid">
    <ul class="thumbnails right">
        <li class="span4">

            <h3>Choose your Date of attendence</h3><hr>
            <?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>            

        </li>

        <li class="span8">

            <h3>Berita Acara</h3><hr>
            <?php $collapse = $this->beginWidget('ext.booster.widgets.TbCollapse'); ?>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="">
                                Jadwal Hari ini
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <?php
                            $date = date('Y-m-d');
                            $gridDataProvider = new CActiveDataProvider('BeritaAcaraKuliah', array(
                                'criteria' => array(
                                    'join' => "JOIN d_jadwal dj ON t.ID_DETAIL_JADWAL = dj.ID JOIN m_jadwal mj ON dj.ID_JADWAL = mj.ID",
                                    'condition' => "mj.TANGGAL LIKE '$date'",
                                ),
                            ));
                            $this->widget(
                                    'booster.widgets.TbGridView', array(
                                'dataProvider' => $gridDataProvider,
                                'emptyText' => 'Jadwal Tidak Ada',
                                'template' => "{items}",
                                'columns' => array(
                                    array(
                                        'header' => 'No',
                                        'value' => '$this->grid->dataProvider->pagination->offset + $row+1', //  row is zero based
                                    ),
                                    array(
                                        'header' => 'Kelas',
                                        'value' => '$data->iddetailjadwal->idjadwal->KELAS',
                                    ),
                                    array(
                                        'header' => 'Sesi',
                                        'value' => '$data->iddetailjadwal->SESSION',
                                    ),
                                    array(
                                        'header' => 'Mata Kuliah',
                                        'value' => '$data->iddetailjadwal->kodemk->SHORT_NAME',
                                    ),
                                    array(
                                        'header' => 'Ruangan',
                                        'value' => '$data->iddetailjadwal->RUANGAN',
                                    ),
                                    array(
                                        'header' => 'Aktifitas',
                                        'value' => '$data->iddetailjadwal->AKTIFITAS',
                                    ),
                                    array(
                                        'header' => 'Aksi',
                                        'class' => 'booster.widgets.TbButtonColumn',
                                        'template' => '{view}',
                                        'viewButtonUrl' => 'Yii::app()->createUrl(\'djadwal/view\',array(\'id\'=>\'\'.$data->iddetailjadwal->ID.\'\'))',
                                    ),
                                ),
                                    )
                            );
                            //'ID', 'SESSION', 'TA', 'ID_KUR', 'KODE_MK', 'KELAS', 'TANGGAL', 'TOPIK'
                            ?>      
                        </div>
                    </div>

                </div>
            </div>
        </li>

    </ul>
</div>




<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>

<script type="text/javascript">
    $(function() {
        $('#slider-nivo').nivoSlider({
            effect: 'boxRandom',
            manualAdvance: false,
            controlNav: false
        });
    });
</script> <!--<script type="text/javascript">
$(document).ready(function() {
   $('#slider-nivo2').nivoSlider();
});
</script>-->

<?php $this->endWidget(); ?>