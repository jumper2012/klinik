<?php

/**
 * This is the model class for table "kartu_bersalin".
 *
 * The followings are the available columns in table 'kartu_bersalin':
 * @property string $id_kartu_bersalin
 * @property string $id_pasien
 *
 * The followings are the available model relations:
 * @property Pasien $idPasien
 * @property RekamMedis[] $rekamMedises
 * @property Tbersalin[] $tbersalins
 */
class KartuBersalin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KartuBersalin the static model class
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
		return 'kartu_bersalin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pasien', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_kartu_bersalin, id_pasien', 'safe', 'on'=>'search'),
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
			'idPasien' => array(self::BELONGS_TO, 'Pasien', 'id_pasien'),
			'rekamMedises' => array(self::HAS_MANY, 'RekamMedis', 'id_kartu_bersalin'),
			'tbersalins' => array(self::HAS_MANY, 'Tbersalin', 'id_kartu_bersalin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kartu_bersalin' => 'Id Kartu Bersalin',
			'id_pasien' => 'Id Pasien',
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

		$criteria->compare('id_kartu_bersalin',$this->id_kartu_bersalin,true);
		$criteria->compare('id_pasien',$this->id_pasien,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}