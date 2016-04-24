<?php

/**
 * This is the model class for table "Gg_manutencoes".
 *
 * The followings are the available columns in table 'Gg_manutencoes':
 * @property integer $manutencoes_id
 * @property integer $veiculos_id
 * @property integer $manutencao_quilometragem
 * @property string $manutencao_descricao
 * @property double $manutencao_preco
 * @property string $manutencao_data
 * @property integer $prefeituras_id
 */
class Gg_manutencoes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_manutencoes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('veiculos_id, manutencao_quilometragem, manutencao_descricao, manutencao_data, prefeituras_id', 'required'),
			array('veiculos_id, manutencao_quilometragem, prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('manutencao_preco', 'numerical'),
			array('manutencao_descricao', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('manutencoes_id, veiculos_id, manutencao_quilometragem, manutencao_descricao, manutencao_preco, manutencao_data, prefeituras_id', 'safe', 'on'=>'search'),
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
			'manutencoes_id' => 'Manutenção',
			'veiculos_id' => 'Veículo',
                        'veiculos.veiculo_placa' => 'Veículo',
			'manutencao_quilometragem' => 'Quilometragem',
			'manutencao_descricao' => 'Descrição',
			'manutencao_preco' => 'Preço',
			'manutencao_data' => 'Data',
			'prefeituras_id' => 'Prefeitura',
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

		$criteria->compare('manutencoes_id',$this->manutencoes_id);

		$criteria->compare('veiculos_id',$this->veiculos_id);

		$criteria->compare('manutencao_quilometragem',$this->manutencao_quilometragem);

		$criteria->compare('manutencao_descricao',$this->manutencao_descricao,true);

		$criteria->compare('manutencao_preco',$this->manutencao_preco);

		$criteria->compare('manutencao_data',$this->manutencao_data,true);

		$criteria->compare('prefeituras_id',$this->prefeituras_id);

		return new CActiveDataProvider('Gg_manutencoes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_manutencoes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}