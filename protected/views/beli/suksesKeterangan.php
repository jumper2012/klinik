<?php
//echo "Pembelian sukses";
//var_dump($result);
$counter=0;

$arr_idObat= array();
$arr_qty=array();
$arr_sisa=array();
$arr_untung=array();
$arr_keterangan=array();
//$model = new Obat;
foreach($result as $xyz)
{   
    //echo $xyz['id_obat']."<br>";
    $arr_idObat[$counter]= $xyz['id_obat'];
    $arr_qty[$counter]= $xyz['qty'];
    $arr_keterangan[$counter]= $xyz['keterangan'];
    $model=Obat::model()->findByPk($xyz['id_obat']);
    $model->jumlah=$model->jumlah-$xyz['qty'];
    $model->save();
    
    $sisa_result = Yii::app()->db->createCommand("SELECT jumlah FROM obat WHERE `id_obat`= '$arr_idObat[$counter]'")->queryAll();
    foreach ($sisa_result as $zz) 
    {
        $sisa = $zz['jumlah'];
    }
    $arr_sisa[$counter]=$sisa;

    $hargabeli_result = Yii::app()->db->createCommand("SELECT hargabeli FROM obat WHERE `id_obat`= '$arr_idObat[$counter]'")->queryAll();
    foreach ($hargabeli_result as $xx) 
    {
        $hargabeli = $xx['hargabeli'];
    }
    foreach ($hargabeli_result as $xx) 
    {
        $hargabeli = $xx['hargabeli'];
    }
    $arr_untung[$counter]=0;
    
    $counter++;
}

for($i=0;$i<$counter;$i++)
{
    $sql = "insert into laporan (tgl, keterangan,masuk,keluar,sisa,untung,id_obat) values (:tgl, :keterangan,0,:keluar,:sisa,:untung,:id_obat)";
    $parameters = array('tgl'=>date('Y-m-d'),":keterangan"=>$arr_keterangan[$i],":id_obat"=>$arr_idObat[$i],":keluar"=>$arr_qty[$i],":sisa"=>$arr_sisa[$i],":untung"=>$arr_untung[$i]);
    Yii::app()->db->createCommand($sql)->execute($parameters);   
}
Yii::app()->user->setFlash('pembelian','Pembelian Berhasil dilakukan');
$this->redirect(array('jual/createKeterangan'));
?>
