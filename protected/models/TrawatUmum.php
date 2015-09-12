<?php

/**
 * This is the model class for table "trawat_umum".
 *
 * The followings are the available columns in table 'trawat_umum':
 * @property string $id_rawatumum
 * @property string $id_kru
 * @property string $tgl
 * @property string $historia_morbi
 * @property string $terapi
 *
 * The followings are the available model relations:
 * @property KartuRawatUmum $idKru
 */
class TrawatUmum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TrawatUmum the static model class
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
		return 'trawat_umum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kru', 'required'),
			array('id_kru', 'length', 'max'=>10),
			array('tgl, historia_morbi, terapi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rawatumum, id_kru, tgl, historia_morbi, terapi', 'safe', 'on'=>'search'),
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
			'idKru' => array(self::BELONGS_TO, 'KartuRawatUmum', 'id_kru'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rawatumum' => 'Id Rawatumum',
			'id_kru' => 'No. Kartu Rawat Umum',
			'tgl' => 'Tgl',
			'historia_morbi' => 'Historia Morbi',
			'terapi' => 'Terapi',
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

		$criteria->compare('id_rawatumum',$this->id_rawatumum,true);
		$criteria->compare('id_kru',$this->id_kru,true);
		$criteria->compare('tgl',$this->tgl,true);
		$criteria->compare('historia_morbi',$this->historia_morbi,true);
		$criteria->compare('terapi',$this->terapi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}