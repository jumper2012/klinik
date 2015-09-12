<?php

/**
 * This is the model class for table "laporan".
 *
 * The followings are the available columns in table 'laporan':
 * @property integer $id_laporan
 * @property string $tgl
 * @property string $keterangan
 * @property integer $masuk
 * @property integer $keluar
 * @property integer $sisa
 * @property integer $untung
 * @property string $id_obat
 *
 * The followings are the available model relations:
 * @property Obat $idObat
 */
class Laporan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Laporan the static model class
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
		return 'laporan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('masuk, keluar, sisa, untung', 'numerical', 'integerOnly'=>true),
			array('keterangan', 'length', 'max'=>30),
			array('id_obat', 'length', 'max'=>10),
			array('tgl', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_laporan, tgl, keterangan, masuk, keluar, sisa, untung, id_obat', 'safe', 'on'=>'search'),
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
			'idObat' => array(self::BELONGS_TO, 'Obat', 'id_obat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_laporan' => 'Id Laporan',
			'tgl' => 'Tgl',
			'keterangan' => 'Keterangan',
			'masuk' => 'Masuk',
			'keluar' => 'Keluar',
			'sisa' => 'Sisa',
			'untung' => 'Untung',
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

		$criteria->compare('id_laporan',$this->id_laporan);
		$criteria->compare('tgl',$this->tgl,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('masuk',$this->masuk);
		$criteria->compare('keluar',$this->keluar);
		$criteria->compare('sisa',$this->sisa);
		$criteria->compare('untung',$this->untung);
		$criteria->compare('id_obat',$this->id_obat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}