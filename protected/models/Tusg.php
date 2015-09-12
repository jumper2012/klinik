<?php

/**
 * This is the model class for table "tusg".
 *
 * The followings are the available columns in table 'tusg':
 * @property string $id_usg
 * @property string $id_kartu_usg
 * @property string $nama_suami
 * @property string $grafida
 * @property string $hpht
 * @property string $ttp
 * @property string $td_bb
 * @property string $keluhan
 * @property string $usia_kehaliman
 * @property string $terapi
 * @property string $keterangan
 * @property string $tgl
 *
 * The followings are the available model relations:
 * @property KartuUsg $idKartuUsg
 */
class Tusg extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tusg the static model class
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
		return 'tusg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kartu_usg', 'length', 'max'=>10),
			array('nama_suami, grafida, hpht, ttp, td_bb, usia_kehaliman', 'length', 'max'=>32),
			array('keluhan, terapi, keterangan, tgl', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usg, id_kartu_usg, nama_suami, grafida, hpht, ttp, td_bb, keluhan, usia_kehaliman, terapi, keterangan, tgl', 'safe', 'on'=>'search'),
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
			'idKartuUsg' => array(self::BELONGS_TO, 'KartuUsg', 'id_kartu_usg'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usg' => 'Id Usg',
			'id_kartu_usg' => 'No. Kartu Usg',
			'nama_suami' => 'Nama Suami',
			'grafida' => 'Gravida',
			'hpht' => 'HPHT',
			'ttp' => 'TTP',
			'td_bb' => 'TD BB',
			'keluhan' => 'Keluhan',
			'usia_kehaliman' => 'Usia Kehaliman',
			'terapi' => 'Terapi',
			'keterangan' => 'Keterangan',
			'tgl' => 'Tgl',
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

		$criteria->compare('id_usg',$this->id_usg,true);
		$criteria->compare('id_kartu_usg',$this->id_kartu_usg,true);
		$criteria->compare('nama_suami',$this->nama_suami,true);
		$criteria->compare('grafida',$this->grafida,true);
		$criteria->compare('hpht',$this->hpht,true);
		$criteria->compare('ttp',$this->ttp,true);
		$criteria->compare('td_bb',$this->td_bb,true);
		$criteria->compare('keluhan',$this->keluhan,true);
		$criteria->compare('usia_kehaliman',$this->usia_kehaliman,true);
		$criteria->compare('terapi',$this->terapi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('tgl',$this->tgl,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}