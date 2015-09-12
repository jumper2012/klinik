<?php

/**
 * This is the model class for table "jualbeli".
 *
 * The followings are the available columns in table 'jualbeli':
 * @property string $id_jualbeli
 * @property string $id_obat
 * @property string $tgltrans
 * @property string $no_faktur
 * @property string $no_resep
 * @property string $distributor
 * @property integer $jlh_beli
 * @property integer $jlh_jual
 * @property string $no_batch
 * @property string $ed
 *
 * The followings are the available model relations:
 * @property Obat $idObat
 */
class JualBeli extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JualBeli the static model class
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
		return 'jualbeli';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jlh_beli, jlh_jual', 'numerical', 'integerOnly'=>true),
			array('id_obat', 'length', 'max'=>10),
			array('no_faktur, no_resep, distributor, no_batch, ed', 'length', 'max'=>32),
			array('tgltrans', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_jualbeli, id_obat, tgltrans, no_faktur, no_resep, distributor, jlh_beli, jlh_jual, no_batch, ed', 'safe', 'on'=>'search'),
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
			'id_jualbeli' => 'Id Jualbeli',
			'id_obat' => 'Id Obat',
			'tgltrans' => 'Tgltrans',
			'no_faktur' => 'No Faktur',
			'no_resep' => 'No Resep',
			'distributor' => 'Distributor',
			'jlh_beli' => 'Jlh Beli',
			'jlh_jual' => 'Jlh Jual',
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

		$criteria->compare('id_jualbeli',$this->id_jualbeli,true);
		$criteria->compare('id_obat',$this->id_obat,true);
		$criteria->compare('tgltrans',$this->tgltrans,true);
		$criteria->compare('no_faktur',$this->no_faktur,true);
		$criteria->compare('no_resep',$this->no_resep,true);
		$criteria->compare('distributor',$this->distributor,true);
		$criteria->compare('jlh_beli',$this->jlh_beli);
		$criteria->compare('jlh_jual',$this->jlh_jual);
		$criteria->compare('no_batch',$this->no_batch,true);
		$criteria->compare('ed',$this->ed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}