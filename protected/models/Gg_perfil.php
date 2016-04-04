<?php

/**
 * This is the model class for table "Gg_perfil".
 *
 * The followings are the available columns in table 'Gg_perfil':
 * @property integer $perfis_id
 * @property string $perfil_nome
 * @property integer $perfil_capabilidade
 */
class Gg_perfil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_perfil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perfil_nome, perfil_capabilidade', 'required'),
			array('perfil_capabilidade', 'numerical', 'integerOnly'=>true),
			array('perfil_nome', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('perfis_id, perfil_nome, perfil_capabilidade', 'safe', 'on'=>'search'),
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
			'perfis_id' => 'Perfis',
			'perfil_nome' => 'Perfil Nome',
			'perfil_capabilidade' => 'Perfil Capabilidade',
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

		$criteria->compare('perfis_id',$this->perfis_id);

		$criteria->compare('perfil_nome',$this->perfil_nome,true);

		$criteria->compare('perfil_capabilidade',$this->perfil_capabilidade);

		return new CActiveDataProvider('Gg_perfil', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_perfil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}