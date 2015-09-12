<?php

/**
 * This is the model class for table "trawat_inap".
 *
 * The followings are the available columns in table 'trawat_inap':
 * @property string $id_rawat_inap
 * @property string $id_kri
 * @property string $tgl
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property KartuRawatInap $idKri
 */
class Trawatinap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Trawatinap the static model class
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
		return 'trawat_inap';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kri', 'required'),
			array('id_kri', 'length', 'max'=>10),
			array('tgl, keterangan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_rawat_inap, id_kri, tgl, keterangan', 'safe', 'on'=>'search'),
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
			'idKri' => array(self::BELONGS_TO, 'KartuRawatInap', 'id_kri'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rawat_inap' => 'Id Rawat Inap',
			'id_kri' => 'Id Kri',
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

		$criteria->compare('id_rawat_inap',$this->id_rawat_inap,true);
		$criteria->compare('id_kri',$this->id_kri,true);
		$criteria->compare('tgl',$this->tgl,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}