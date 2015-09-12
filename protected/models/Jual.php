<?php

/**
 * This is the model class for table "jual".
 *
 * The followings are the available columns in table 'jual':
 * @property string $id_jual
 * @property string $tgltrans
 * @property string $no_resep
 * @property string $distributor
 * @property string $no_batch
 * @property string $ed
 *
 * The followings are the available model relations:
 * @property ListPenjualan[] $listPenjualans
 */
class Jual extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jual the static model class
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
		return 'jual';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_resep, distributor, no_batch, ed', 'length', 'max'=>32),
			array('tgltrans', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_jual, tgltrans, no_resep, distributor, no_batch, ed', 'safe', 'on'=>'search'),
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
			'listPenjualans' => array(self::HAS_MANY, 'ListPenjualan', 'id_jual'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_jual' => 'Id Jual',
			'tgltrans' => 'Tgltrans',
			'no_resep' => 'No Resep',
			'distributor' => 'Distributor',
			'no_batch' => 'No Batch',
			'ed' => 'Ed',
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

		$criteria->compare('id_jual',$this->id_jual,true);
		$criteria->compare('tgltrans',$this->tgltrans,true);
		$criteria->compare('no_resep',$this->no_resep,true);
		$criteria->compare('distributor',$this->distributor,true);
		$criteria->compare('no_batch',$this->no_batch,true);
		$criteria->compare('ed',$this->ed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}