<?php

/**
 * This is the model class for table "Gg_responsaveis".
 *
 * The followings are the available columns in table 'Gg_responsaveis':
 * @property integer $responsaveis_id
 * @property string $responsavel_nome
 * @property string $responsavel_cpf
 * @property string $responsavel_telefone
 * @property string $funcao
 * @property integer $prefeituras_id
 */
class Gg_responsaveis extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_responsaveis';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('responsavel_nome, responsavel_cpf, responsavel_telefone, prefeituras_id', 'required'),
			array('prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('responsavel_nome, funcao', 'length', 'max'=>80),
			array('responsavel_cpf', 'length', 'max'=>16),
			array('responsavel_telefone', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('responsaveis_id, responsavel_nome, responsavel_cpf, responsavel_telefone, funcao, prefeituras_id', 'safe', 'on'=>'search'),
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
			'responsaveis_id' => 'Código',
			'responsavel_nome' => 'Nome',
			'responsavel_cpf' => 'CPF',
			'responsavel_telefone' => 'Telefone',
			'funcao' => 'Função',
			'prefeituras_id' => 'Prefeituras',
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

		$criteria->compare('responsaveis_id',$this->responsaveis_id);

		$criteria->compare('responsavel_nome',$this->responsavel_nome,true);

		$criteria->compare('responsavel_cpf',$this->responsavel_cpf,true);

		$criteria->compare('responsavel_telefone',$this->responsavel_telefone);

		$criteria->compare('funcao',$this->funcao);

		$criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_responsaveis', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_responsaveis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}