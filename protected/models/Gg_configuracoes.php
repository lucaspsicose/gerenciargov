<?php

/**
 * This is the model class for table "Gg_configuracoes".
 *
 * The followings are the available columns in table 'Gg_configuracoes':
 * @property integer $configuracoes_id
 * @property string $configuracao_field
 * @property string $configuracao_valor
 * @property integer $usuarios_id
 * @property integer $prefeituras_id
 * @property integer $secretarias_id
 */
class Gg_configuracoes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_configuracoes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('configuracao_field, configuracao_valor', 'required'),
			array('usuarios_id, prefeituras_id, secretarias_id', 'numerical', 'integerOnly'=>true),
			array('configuracao_field, configuracao_valor', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('configuracoes_id, configuracao_field, configuracao_valor, usuarios_id, prefeituras_id, secretarias_id', 'safe', 'on'=>'search'),
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
			'configuracoes_id' => 'Configuracoes',
			'configuracao_field' => 'Configuracao Field',
			'configuracao_valor' => 'Configuracao Valor',
			'usuarios_id' => 'Usuarios',
			'prefeituras_id' => 'Prefeituras',
			'secretarias_id' => 'Secretarias',
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

		$criteria->compare('configuracoes_id',$this->configuracoes_id);

		$criteria->compare('configuracao_field',$this->configuracao_field,true);

		$criteria->compare('configuracao_valor',$this->configuracao_valor,true);

		$criteria->compare('usuarios_id',$this->usuarios_id);

		$criteria->compare('prefeituras_id',$this->prefeituras_id);

		$criteria->compare('secretarias_id',$this->secretarias_id);

		return new CActiveDataProvider('Gg_configuracoes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_configuracoes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}