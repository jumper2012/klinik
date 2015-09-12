<?php

/**
 * This is the model class for table "tbersalin".
 *
 * The followings are the available columns in table 'tbersalin':
 * @property string $id_bersalin
 * @property string $id_kartu_bersalin
 * @property string $tgl
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property KartuBersalin $idKartuBersalin
 */
class Tbersalin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tbersalin the static model class
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
		return 'tbersalin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kartu_bersalin', 'required'),
			array('id_kartu_bersalin', 'length', 'max'=>10),
			array('tgl, keterangan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_bersalin, id_kartu_bersalin, tgl, keterangan', 'safe', 'on'=>'search'),
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
			'idKartuBersalin' => array(self::BELONGS_TO, 'KartuBersalin', 'id_kartu_bersalin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_bersalin' => 'Id Bersalin',
			'id_kartu_bersalin' => 'No. Kartu Bersalin',
			'tgl' => 'Tgl',
			'keterangan' => 'Keterangan',
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

		$criteria->compare('id_bersalin',$this->id_bersalin,true);
		$criteria->compare('id_kartu_bersalin',$this->id_kartu_bersalin,true);
		$criteria->compare('tgl',$this->tgl,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}