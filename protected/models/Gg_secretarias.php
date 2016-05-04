<?php

/**
 * This is the model class for table "Gg_secretarias".
 *
 * The followings are the available columns in table 'Gg_secretarias':
 * @property integer $secretarias_id
 * @property string $secretaria_nome
 * @property string $secretaria_secretario
 * @property string $secretaria_telefone
 * @property string $secretaria_email
 * @property integer $prefeituras_id
 */
class Gg_secretarias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_secretarias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('secretaria_nome, secretaria_secretario, secretaria_telefone, secretaria_email, prefeituras_id', 'required'),
			array('secretaria_nome, secretaria_email', 'length', 'max'=>60),
			array('secretaria_secretario', 'length', 'max'=>80),
			array('secretaria_telefone', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('secretarias_id, secretaria_nome, secretaria_secretario, secretaria_telefone, secretaria_email, prefeituras_id, prefeituras.prefeitura_nome', 'safe', 'on'=>'search'),
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
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'secretarias_id' => 'Código',
			'secretaria_nome' => 'Nome',
			'secretaria_secretario' => 'Secretário',
			'secretaria_telefone' => 'Telefone',
			'secretaria_email' => 'Email',
                        'prefeituras_id' => 'Código da Prefeitura',
                        'prefeituras.prefeitura_nome' => 'Prefeitura',
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

		$criteria->compare('secretarias_id',$this->secretarias_id);

		$criteria->compare('secretaria_nome',$this->secretaria_nome,true);

		$criteria->compare('secretaria_secretario',$this->secretaria_secretario,true);

		$criteria->compare('secretaria_telefone',$this->secretaria_telefone,true);

		$criteria->compare('secretaria_email',$this->secretaria_email,true);
                
                $criteria->compare('prefeituras_id', Yii::app()->session['active_prefeituras_id'], true);
                
                //$criteria->condition = 't.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];

		return new CActiveDataProvider('Gg_secretarias', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_secretarias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}