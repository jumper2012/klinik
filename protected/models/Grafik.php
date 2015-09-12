<?php

Class Grafik extends CFormModel { //siapkan field/variabel yang akan digunakan 

    public $tanggal;
    
    //aturan yang berlaku untuk model ini
    public function rules() {
        //bilangan1 dan bilangan2 harus diisi dan keduanya
        //harus berupa angka
        return array(
            array('tanggal', 'required'),
            array('tanggal', 'safe'),
			array('tanggal', 'length', 'max'=>10),
//			array('tanggal', 'safe'),
            
        );
    }

    //tampilan / label yang akan ditampilkan untuk tiap atribut
    public function attributelabels() {
        return array(
            'tanggal' => 'Tanggal Pilihan',);
    }
}
?>