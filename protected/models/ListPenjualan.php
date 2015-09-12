<?php

/**
 * This is the model class for table "list_penjualan".
 *
 * The followings are the available columns in table 'list_penjualan':
 * @property string $id_list_penjualan
 * @property string $nama_obat
 * @property integer $qty
 * @property integer $harga_satuan
 * @property integer $total
 * @property string $id_jual
 * @property string $id_obat
 *
 * The followings are the available model relations:
 * @property Jual $idJual
 * @property Obat $idObat
 */
class ListPenjualan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ListPenjualan the static model class
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
		return 'list_penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qty, harga_satuan, total', 'numerical', 'integerOnly'=>true),
			array('nama_obat', 'length', 'max'=>32),
			array('id_jual, id_obat', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_list_penjualan, nama_obat, qty, harga_satuan, total, id_jual, id_obat', 'safe', 'on'=>'search'),
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
			'idJual' => array(self::BELONGS_TO, 'Jual', 'id_jual'),
			'idObat' => array(self::BELONGS_TO, 'Obat', 'id_obat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_list_penjualan' => 'Id List Penjualan',
			'nama_obat' => 'Nama Obat',
			'qty' => 'Qty',
			'harga_satuan' => 'Harga Satuan',
			'total' => 'Total',
			'id_jual' => 'Id Jual',
			'id_obat' => 'Id Obat',
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

		$criteria->compare('id_list_penjualan',$this->id_list_penjualan,true);
		$criteria->compare('nama_obat',$this->nama_obat,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('harga_satuan',$this->harga_satuan);
		$criteria->compare('total',$this->total);
		$criteria->compare('id_jual',$this->id_jual,true);
		$criteria->compare('id_obat',$this->id_obat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}