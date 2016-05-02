<?php

/**
 * This is the model class for table "Gg_tipo_combustivel".
 *
 * The followings are the available columns in table 'Gg_tipo_combustivel':
 * @property integer $combustivel_id
 * @property string $combustivel_nome
 */
class Gg_tipo_combustivel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_tipo_combustivel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('combustivel_nome', 'required'),
			array('combustivel_nome', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('combustivel_id, combustivel_nome', 'safe', 'on'=>'search'),
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
			'combustivel_id' => 'Combustivel',
			'combustivel_nome' => 'Combustivel Nome',
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

		$criteria->compare('combustivel_id',$this->combustivel_id);

		$criteria->compare('combustivel_nome',$this->combustivel_nome,true);

		return new CActiveDataProvider('Gg_tipo_combustivel', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_tipo_combustivel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}