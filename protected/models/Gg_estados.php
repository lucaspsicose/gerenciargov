<?php

/**
 * This is the model class for table "Gg_estados".
 *
 * The followings are the available columns in table 'Gg_estados':
 * @property integer $estados_id
 * @property string $estado_sigla
 * @property string $estado_nome
 */
class Gg_estados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado_sigla, estado_nome', 'required'),
			array('estado_sigla', 'length', 'max'=>2),
			array('estado_nome', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('estados_id, estado_sigla, estado_nome', 'safe', 'on'=>'search'),
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
			'estados_id' => 'Estados',
			'estado_sigla' => 'Estado Sigla',
			'estado_nome' => 'Estado Nome',
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

		$criteria->compare('estados_id',$this->estados_id);

		$criteria->compare('estado_sigla',$this->estado_sigla,true);

		$criteria->compare('estado_nome',$this->estado_nome,true);

		return new CActiveDataProvider('Gg_estados', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_estados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}