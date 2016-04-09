<?php

/**
 * This is the model class for table "Gg_motoristas".
 *
 * The followings are the available columns in table 'Gg_motoristas':
 * @property integer $motoristas_id
 * @property string $motorista_nome
 * @property string $motorista_cpf
 * @property string $motorista_categoria
 * @property integer $motorista_telefone
 */
class Gg_motoristas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_motoristas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('motorista_nome, motorista_cpf, motorista_categoria', 'required'),
			array('motorista_telefone', 'length', 'max'=>15),
			array('motorista_nome', 'length', 'max'=>80),
			array('motorista_cpf', 'length', 'max'=>16),
			array('motorista_categoria', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('motoristas_id, motorista_nome, motorista_cpf, motorista_categoria, motorista_telefone', 'safe', 'on'=>'search'),
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
			'motoristas_id' => 'Código',
			'motorista_nome' => 'Nome',
			'motorista_cpf' => 'CPF',
			'motorista_categoria' => 'Categoria da CNH',
			'motorista_telefone' => 'Telefone',
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

		$criteria->compare('motoristas_id',$this->motoristas_id);

		$criteria->compare('motorista_nome',$this->motorista_nome,true);

		$criteria->compare('motorista_cpf',$this->motorista_cpf,true);

		$criteria->compare('motorista_categoria',$this->motorista_categoria,true);

		$criteria->compare('motorista_telefone',$this->motorista_telefone);

		return new CActiveDataProvider('Gg_motoristas', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_motoristas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}