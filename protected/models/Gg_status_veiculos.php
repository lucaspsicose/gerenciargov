<?php

/**
 * This is the model class for table "Gg_status_veiculos".
 *
 * The followings are the available columns in table 'Gg_status_veiculos':
 * @property integer $status_veiculos_id
 * @property string $status_nome
 */
class Gg_status_veiculos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_status_veiculos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_nome', 'required'),
			array('status_nome', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status_veiculos_id, status_nome', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'status_veiculos_id' => 'Status Veiculos',
			'status_nome' => 'Status Nome',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('status_veiculos_id',$this->status_veiculos_id);

		$criteria->compare('status_nome',$this->status_nome,true);

		return new CActiveDataProvider('Gg_status_veiculos', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_status_veiculos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}