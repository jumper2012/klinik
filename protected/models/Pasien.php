<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property string $id_pasien
 * @property string $nama
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $pekerjaan
 * @property string $jenis_kelamin
 * @property string $suku
 * @property string $agama
 * @property string $tel
 *
 * The followings are the available model relations:
 * @property KartuBersalin[] $kartuBersalins
 * @property KartuRawatUmum[] $kartuRawatUmums
 * @property KartuUsg[] $kartuUsgs
 */
class Pasien extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pasien the static model class
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
		return 'pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_lahir', 'required'),
			array('nama, alamat, pekerjaan, suku, tel', 'length', 'max'=>32),
			array('jenis_kelamin', 'length', 'max'=>11),
			array('agama', 'length', 'max'=>17),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pasien, nama, tanggal_lahir, alamat, pekerjaan, jenis_kelamin, suku, agama, tel', 'safe', 'on'=>'search'),
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
			'kartuBersalins' => array(self::HAS_MANY, 'KartuBersalin', 'id_pasien'),
			'kartuRawatUmums' => array(self::HAS_MANY, 'KartuRawatUmum', 'id_pasien'),
			'kartuUsgs' => array(self::HAS_MANY, 'KartuUsg', 'id_pasien'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pasien' => 'Id Pasien',
			'nama' => 'Nama',
			'tanggal_lahir' => 'Tanggal Lahir',
			'alamat' => 'Alamat',
			'pekerjaan' => 'Pekerjaan',
			'jenis_kelamin' => 'Jenis Kelamin',
			'suku' => 'Suku',
			'agama' => 'Agama',
			'tel' => 'Tel',
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

		$criteria->compare('id_pasien',$this->id_pasien,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('pekerjaan',$this->pekerjaan,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('suku',$this->suku,true);
		$criteria->compare('agama',$this->agama,true);
		$criteria->compare('tel',$this->tel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}