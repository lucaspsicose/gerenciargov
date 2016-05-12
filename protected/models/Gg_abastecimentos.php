<?php

/**
 * This is the model class for table "Gg_abastecimentos".
 *
 * The followings are the available columns in table 'Gg_abastecimentos':
 * @property integer $abastecimentos_id
 * @property integer $veiculos_id
 * @property integer $abastecimento_quilometragem
 * @property integer $combustivel_id
 * @property double $abastecimento_litro
 * @property double $abastecimento_preco
 * @property string $abastecimento_data
 * @property integer $prefeituras_id
 */
class Gg_abastecimentos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_abastecimentos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('veiculos_id, abastecimento_quilometragem, combustivel_id, abastecimento_litro, abastecimento_preco, abastecimento_data, prefeituras_id', 'required'),
			array('veiculos_id, abastecimento_quilometragem, combustivel_id, prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('abastecimento_litro, abastecimento_preco', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('abastecimentos_id, veiculos_id, abastecimento_quilometragem, combustivel_id, abastecimento_litro, abastecimento_preco, abastecimento_data, prefeituras_id', 'safe', 'on'=>'search'),
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
                    'combustivel'=>array(self::BELONGS_TO, 'Gg_tipo_combustivel', 'combustivel_id'),
                    'veiculos'=>array(self::BELONGS_TO, 'Gg_veiculos', 'veiculos_id'),
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'abastecimentos_id' => 'Abastecimentos',
			'veiculos_id' => 'Veículo',
                        'veiculos.veiculo_descricao' => 'Veículo',
                        'veiculos.veiculo_placa' => 'Placa',
			'abastecimento_quilometragem' => 'Quilometragem',
			'combustivel_id' => 'Combustivel',
                        'combustivel.combustivel_nome' => 'Combustível',
			'abastecimento_litro' => 'Litros',
			'abastecimento_preco' => 'Preço',
			'abastecimento_data' => 'Data',
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

		$criteria->compare('abastecimentos_id',$this->abastecimentos_id);

		$criteria->compare('veiculos_id',$this->veiculos_id);

		$criteria->compare('abastecimento_quilometragem',$this->abastecimento_quilometragem);

		$criteria->compare('combustivel_id',$this->combustivel_id);

		$criteria->compare('abastecimento_litro',$this->abastecimento_litro);

		$criteria->compare('abastecimento_preco',$this->abastecimento_preco);

		$criteria->compare('abastecimento_data',$this->abastecimento_data,true);

		$criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_abastecimentos', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_abastecimentos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}