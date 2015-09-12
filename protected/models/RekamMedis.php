<?php

/**
 * This is the model class for table "rekam_medis".
 *
 * The followings are the available columns in table 'rekam_medis':
 * @property string $id_rekammedis
 * @property string $id_kartu_usg
 * @property string $id_pasien
 * @property string $id_kru
 * @property string $id_kartu_bersalin
 *
 * The followings are the available model relations:
 * @property KartuUsg $idKartuUsg
 * @property Pasien $idPasien
 * @property KartuRawatUmum $idKru
 * @property KartuBersalin $idKartuBersalin
 */
class RekamMedis extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RekamMedis the static model class
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
		return 'rekam_medis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kartu_usg, id_pasien, id_kru, id_kartu_bersalin', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rekammedis, id_kartu_usg, id_pasien, id_kru, id_kartu_bersalin', 'safe', 'on'=>'search'),
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
			'idPasien' => array(self::BELONGS_TO, 'Pasien', 'id_pasien'),
			'idKru' => array(self::BELONGS_TO, 'KartuRawatUmum', 'id_kru'),
			'idKartuBersalin' => array(self::BELONGS_TO, 'KartuBersalin', 'id_kartu_bersalin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rekammedis' => 'Id Rekammedis',
			'id_kartu_usg' => 'Id Kartu Usg',
			'id_pasien' => 'Id Pasien',
			'id_kru' => 'Id Kru',
			'id_kartu_bersalin' => 'Id Kartu Bersalin',
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

		$criteria->compare('id_rekammedis',$this->id_rekammedis,true);
		$criteria->compare('id_kartu_usg',$this->id_kartu_usg,true);
		$criteria->compare('id_pasien',$this->id_pasien,true);
		$criteria->compare('id_kru',$this->id_kru,true);
		$criteria->compare('id_kartu_bersalin',$this->id_kartu_bersalin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}