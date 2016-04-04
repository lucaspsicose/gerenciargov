<?php

/**
 * This is the model class for table "Gg_servicos".
 *
 * The followings are the available columns in table 'Gg_servicos':
 * @property integer $servicos_id
 * @property string $servico_nome
 * @property integer $secretarias_id
 */
class Gg_servicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_servicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servico_nome, secretarias_id', 'required'),
			array('secretarias_id', 'numerical', 'integerOnly'=>true),
			array('servico_nome', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('servicos_id, servico_nome, secretarias_id', 'safe', 'on'=>'search'),
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
			'servicos_id' => 'Servicos',
			'servico_nome' => 'Servico Nome',
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

		$criteria->compare('servicos_id',$this->servicos_id);

		$criteria->compare('servico_nome',$this->servico_nome,true);

		$criteria->compare('secretarias_id',$this->secretarias_id);

		return new CActiveDataProvider('Gg_servicos', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_servicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}