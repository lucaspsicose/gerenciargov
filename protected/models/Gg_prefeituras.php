<?php

/**
 * This is the model class for table "Gg_prefeituras".
 *
 * The followings are the available columns in table 'Gg_prefeituras':
 * @property integer $prefeituras_id
 * @property string $prefeitura_nome
 * @property string $prefeitura_municipio
 * @property integer $estados_id
 * @property string $prefeitura_endereco
 * @property string $prefeitura_numero
 * @property string $prefeitura_telefone
 */
class Gg_prefeituras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_prefeituras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prefeitura_nome, prefeitura_municipio, estados_id, prefeitura_endereco, prefeitura_numero, prefeitura_telefone', 'required'),
			array('estados_id', 'numerical', 'integerOnly'=>true),
			array('prefeitura_nome, prefeitura_municipio, prefeitura_endereco', 'length', 'max'=>80),
			array('prefeitura_numero', 'length', 'max'=>5),
			array('prefeitura_telefone', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('prefeituras_id, prefeitura_nome, prefeitura_municipio, estados_id, prefeitura_endereco, prefeitura_numero, prefeitura_telefone', 'safe', 'on'=>'search'),
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
                    'estados'=>array(self::BELONGS_TO, 'Gg_estados', 'estados_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prefeituras_id' => 'Código',
			'prefeitura_nome' => 'Prefeitura',
			'prefeitura_municipio' => 'Municipio',
			'estados_id' => 'Estado',
			'prefeitura_endereco' => 'Endereço',
			'prefeitura_numero' => 'Número',
			'prefeitura_telefone' => 'Telefone',
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

		$criteria->compare('prefeituras_id',$this->prefeituras_id);

		$criteria->compare('prefeitura_nome',$this->prefeitura_nome,true);

		$criteria->compare('prefeitura_municipio',$this->prefeitura_municipio,true);

		$criteria->compare('estados_id',$this->estados_id);

		$criteria->compare('prefeitura_endereco',$this->prefeitura_endereco,true);

		$criteria->compare('prefeitura_numero',$this->prefeitura_numero,true);

		$criteria->compare('prefeitura_telefone',$this->prefeitura_telefone,true);

		return new CActiveDataProvider('Gg_prefeituras', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_prefeituras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}