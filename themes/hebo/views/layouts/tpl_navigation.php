<?php $date= date('Y-m-d');
$orderdate=explode('-',$date);
$year =$orderdate[0];
?>
<section id="navigation-main">  
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'nav'),
                        'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                        'itemCssClass' => 'item-test',
                        'encodeLabel' => false,
                        'items' => array(
                            array('label' => 'Home', 'url' => array('/site/index'),'linkOptions' => array("data-description" => "Our Home")),                           
                            array('label' => 'Klinik <span class="caret"></span>', 'url' => array('/site/page', 'view' => 'columns'), 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Data Pasien"),
                                'items' => array(
                                    array('label' => 'Pasien', 'url' => array('/pasien/admin', 'view' => 'columns')),
                                    array('label' => 'Rawat Bersalin', 'url' => array('/tbersalin/admin')),
                                    array('label' => 'Rawat Umum', 'url' => array('/trawatumum/admin', 'view' => 'pricing-tables')),
                                    array('label' => 'Rawat Inap', 'url' => array('/trawatinap/admin', 'view' => 'pricing-tables')),
                                    array('label' => 'USG', 'url' => array('/tusg/admin')),
                            )),
                            array('label' => 'Grafik Klinik<span class="caret"></span>', 'url' => array('/site/page', 'view' => 'portfolio-4-cols'),'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Grafik Pasien Klinik"),
                                'items' => array(
                                    array('label' => 'Grafik Bulanan', 'url' => array('/creategrafik/viewgrafik', 'tanggal' => date('Y-m-d'))),
                                    array('label' => 'Grafik Tahunan', 'url' => array('/creategrafik/ViewGrafikByYear', 'year' => $year)),
                                    )),                            
                            array('label' => 'Toko Obat <span class="caret"></span>', 'url' => array('/site/page', 'view' => 'portfolio-4-cols'), 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Daftar Obat & Penjualan"),
                                'items' => array(
                                    array('label' => 'Daftar Obat', 'url' => array('obat/admin')),
                                    array('label' => 'Daftar Suplier', 'url' => array('suplier/admin')),
                                    array('label' => 'Pembelian', 'url' => array('/obat/Pembelian')),
                                    array('label' => 'Penjualan Normal', 'url' => array('/Jual/create')),
                                    array('label' => 'Penjualan Keterangan', 'url' => array('/Jual/createKeterangan')),                                    
                                    )),
                            array('label' => 'Laporan & Grafik <span class="caret"></span>', 'url' => array('/site/page', 'view' => 'portfolio-4-cols'), 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "Laporan & Grafik Transaksi Toko Obat"),
                                'items' => array(
                                    array('label' => 'Sort dengan tanggal', 'url' => array('/Laporan/ByDate', 'tanggal' => date('Y-m-d'))),
                                    array('label' => 'Sort dengan nama obat', 'url' => array('/Laporan/ByName', 'id' =>0)),
                                    array('label' => 'Grafik Laporan', 'url' => array('/creategrafik/GrafikPenjualanObat', 'tanggal' => date('Y-m-d'))),
                                    array('label' => 'Grafik Tahunan', 'url' => array('/creategrafik/ViewGrafikPenjualanByYear', 'year' => $year)),
                                    )),
                            array('label' => 'Styles <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "6 Styles"),
                                'items' => array(
                                    array('label' => '<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url' => "javascript:chooseStyle('none', 60)"),
                                    array('label' => '<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url' => "javascript:chooseStyle('style2', 60)"),
                                    array('label' => '<span class="style" style="background-color:#c80681;"></span> Style 3', 'url' => "javascript:chooseStyle('style3', 60)"),
                                    array('label' => '<span class="style" style="background-color:#51a351;"></span> Style 4', 'url' => "javascript:chooseStyle('style4', 60)"),
                                    array('label' => '<span class="style" style="background-color:#b88006;"></span> Style 5', 'url' => "javascript:chooseStyle('style5', 60)"),
                                    array('label' => '<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url' => "javascript:chooseStyle('style6', 60)"),
                            )),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /#navigation-main -->