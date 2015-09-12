<?php
$imagePath = "C:/xampp/htdocs/Klinik_Elivin/images";
//$baseUrl = Yii::app()->assetManager->publish($imagePath);
?>
<?php
//echo $message;
//$message = "2015-04-16";
$timestamp = strtotime($message);
$bulan = date('M', $timestamp);
//echo $bulan;
$orderdate = explode('-', $message);
$tahunbulan = $orderdate[0] . "-" . $orderdate[1];
//echo $tahunbulan; 
$result_laporan = array();
$count_untung = 0;
?>
<table width="900">
    <tr>
        <td align="center" valign="middle" border="1">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td colspan="2"><br></td>
                </tr>
                <tr>
                    <td width="250">
<?php echo CHtml::image($imagePath . '/klinik_elivin.jpg', "", array('width' => 220, 'height' => 60)); ?>
                    </td>
                    <td></td>
                    <td align="center" style="font-size: 14px;" width="715">
                        <B>KLINIK ELIVIN</B>
                        Jl. Bunga Ester No.89, Padang Bulan, Medan, <br>Sumatera Utara <br/>
                        <h3><b>LAPORAN TRANSAKSI</b><br>
                        <?php
                           if($orderdate[2]=='1')
                           {
                               echo "01 ".$bulan." ".$orderdate[0];
                           }                                                      {
                               echo "01 - ".$orderdate[2]." ".$bulan." ".$orderdate[0];
                           }
                        ?>
                        </h3>
                    </td>                
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td border="0.5">
            <table style="font-size: 13px;" cellpadding="0" cellspacing="0">
                <tr>
                    <td border="0.5" align="center" width="30">NO.</td>
                    <td border="0.5" align="center" colspan="2" width="180">TRANSAKSI</td>
                    <td border="0.5" width="250" align="center">NAMA OBAT</td>
                    <td border="0.5" width="100" align="center">JML OBAT</td>
                    <td border="0.5" align="center" colspan="8" width="340">KETERANGAN</td>
                    <td border="0.5" align="center" width="230">HASIL<BR>PENJUALAN</td>
                </tr>

<?php
$counter_no=1;
for ($temp_i = 1; $temp_i <= $orderdate[2]; $temp_i++) {
    if ($temp_i <= 9) {
        $time = $tahunbulan . "-0" . $temp_i;
    } else {
        $time = $tahunbulan . "-" . $temp_i;
    }
    $result_laporan[$temp_i - 1] = Yii::app()->db->createCommand("SELECT obat.nama, laporan.tgl, laporan.id_laporan, laporan.keterangan, laporan.masuk, laporan.keluar, 
    laporan.sisa, laporan.untung,obat.hargabeli, obat.hargajual FROM laporan INNER JOIN obat ON laporan.id_obat = obat.id_obat
        WHERE laporan.tgl = '$time'"
            )->queryAll();    
    $temp_counter = 0;
    foreach ($result_laporan[$temp_i - 1] as $value)
    {    
        ?>
                    <tr height="25">
                        <td border="0.5" rowspan="3" align="center"><?php echo $counter_no; $counter_no++;?></td>
                        <td border="0.5" align="center">Hari</td>
                        <td border="0.5" align="center">
                            <?php $timestamp = strtotime($time);
                                  $hari = date('l', $timestamp);
                                  //echo $hari;
                                if ($hari == 'Monday') {
                                    echo "Senin";
                                } else if ($hari == 'Tuesday') {
                                    echo "Selasa";
                                } else if ($hari == 'Wednesday') {
                                    echo "Rabu";
                                } else if ($hari == 'Thursday') {
                                    echo "Kamis";
                                } else if ($hari == 'Friday') {
                                    echo "Jumat";
                                } else if ($hari == 'Saturday') {
                                    echo "Sabtu";
                                } else if ($hari == 'Monday') {
                                echo "Minggu";
                                
                                }
                            ?>
                        </td>
                        <td border="0.5" rowspan="3" align="center"><?php echo $value["nama"]; ?></td>
                        <td border="0.5" align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="55">Masuk</td>
                                    <td>: </td>
                                    <td align="center">
                                        <?php echo $value["masuk"];?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td border="0.5" colspan="8" rowspan="2"><?php echo $value["keterangan"];?></td>
                        <td border="0.5" align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="75">Harga Jual </td>
                                    <td> : </td>
                                    <td>Rp <?php echo $value["hargajual"];?>,-</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td align="center" border="0.5">Tanggal</td>
                        <td align="center" border="0.5"><?php echo $time; ?></td>
                        <td border="0.5" align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="55">Keluar</td>
                                    <td>: </td>
                                    <td><?php echo $value["keluar"]; ?></td>
                                </tr>
                            </table>
                        </td>
                        <td border="0.5" align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="75">Harga Beli</td>
                                    <td>: </td>
                                    <td>Rp <?php echo $value["hargabeli"];?>,-</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2" align="center" border="0.5">ID Transaksi : <?php echo $value["id_laporan"];?></td>
                        <td border="0.5" align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="55">Stock</td>
                                    <td>: </td>
                                    <td><?php echo $value["sisa"]; ?></td>
                                </tr>
                            </table>
                        </td>
                        <td width="0"></td>
                                <?php
                                if ($value["masuk"] == '0') {
                                    $pembelian = "   ";
                                    $penjualan = "X";
                                } else {
                                    $pembelian = "X";
                                    $penjualan = "   ";
                                }
                                ?>
                        <td>Jenis Transaksi :</td>
                        <td border="2" width="0" align="center"><?php echo "<b>".$pembelian."</b>"; ?></td>
                        <td width="30">Pembelian</td>
                        <td width="2"></td>
                        <td border="2" width="0" align="center"><?php echo "<b>".$penjualan."</b>"; ?></td>
                        <td width="30">Penjualan</td>
                        <td></td>
                        <td border="0.5" align="center">
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="75" background-color: blue >Untung</td>
                                    <td background-color: blue>: </td>
                                    <td background-color: blue>Rp 
                                        <?php 
                                        echo $value["untung"];
                                        $count_untung=$count_untung+$value["untung"];
                                        ?>,-</td>
                                </tr>
                            </table>
                        </td>

                    </tr>
            <?php }} ?>
            </table>
        </td>        
    </tr>
</table>

<h3>Total Keuntungan : Rp <?php echo $count_untung;?> ,-</h3>