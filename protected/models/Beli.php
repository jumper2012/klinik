<?php

/**
 * This is the model class for table "beli".
 *
 * The followings are the available columns in table 'beli':
 * @property string $id_beli
 * @property string $id_obat
 * @property string $tgltrans
 * @property string $no_faktur
 * @property string $distributor
 * @property integer $jlh_beli
 *
 * The followings are the available model relations:
 * @property Obat $idObat
 */
class Beli extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Beli the static model class
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
		return 'beli';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jlh_beli', 'numerical', 'integerOnly'=>true),
			array('id_obat', 'length', 'max'=>10),
			array('no_faktur, distributor', 'length', 'max'=>32),
			array('tgltrans', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_beli, id_obat, tgltrans, no_faktur, distributor, jlh_beli', 'safe', 'on'=>'search'),
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
			'id_beli' => 'Id Beli',
			'id_obat' => 'Id Obat',
			'tgltrans' => 'Tgltrans',
			'no_faktur' => 'No Faktur',
			'distributor' => 'Distributor',
			'jlh_beli' => 'Jlh Beli',
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

		$criteria->compare('id_beli',$this->id_beli,true);
		$criteria->compare('id_obat',$this->id_obat,true);
		$criteria->compare('tgltrans',$this->tgltrans,true);
		$criteria->compare('no_faktur',$this->no_faktur,true);
		$criteria->compare('distributor',$this->distributor,true);
		$criteria->compare('jlh_beli',$this->jlh_beli);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}