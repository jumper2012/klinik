<?php

/**
 * This is the model class for table "obat".
 *
 * The followings are the available columns in table 'obat':
 * @property string $id_obat
 * @property string $nama
 * @property string $jumlah
 * @property string $hargabeli
 * @property string $hargajual
 * @property string $tgl_kadaluarsa
 * @property string $satuan_brg
 *
 * The followings are the available model relations:
 * @property Beli[] $belis
 * @property Laporan[] $laporans
 * @property ListPenjualan[] $listPenjualans
 */
class Obat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Obat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'length', 'max'=>32),
			array('jumlah, hargabeli, hargajual', 'length', 'max'=>10),
			array('satuan_brg', 'length', 'max'=>6),
			array('tgl_kadaluarsa', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_obat, nama, jumlah, hargabeli, hargajual, tgl_kadaluarsa, satuan_brg', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'belis' => array(self::HAS_MANY, 'Beli', 'id_obat'),
			'laporans' => array(self::HAS_MANY, 'Laporan', 'id_obat'),
			'listPenjualans' => array(self::HAS_MANY, 'ListPenjualan', 'id_obat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_obat' => 'Id Obat',
			'nama' => 'Nama',
			'jumlah' => 'Jumlah',
			'hargabeli' => 'Hargabeli',
			'hargajual' => 'Hargajual',
			'tgl_kadaluarsa' => 'Tgl Kadaluarsa',
			'satuan_brg' => 'Satuan Brg',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_obat',$this->id_obat,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('jumlah',$this->jumlah,true);
		$criteria->compare('hargabeli',$this->hargabeli,true);
		$criteria->compare('hargajual',$this->hargajual,true);
		$criteria->compare('tgl_kadaluarsa',$this->tgl_kadaluarsa,true);
		$criteria->compare('satuan_brg',$this->satuan_brg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getColor() {
        
        $statuscolor='white';
        switch ($this->status) {
            case 1:
                $statuscolor='green';
                break;
            case 2:
                $statuscolor='yellow';
                break;
            case 3:
                $statuscolor='pink';
                break;
            case 4:
                $statuscolor='white';
                break;       
        }
        return $statuscolor;        
    }
}