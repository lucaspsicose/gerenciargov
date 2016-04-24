<?php

/**
 * This is the model class for table "Gg_veiculos".
 *
 * The followings are the available columns in table 'Gg_veiculos':
 * @property integer $veiculos_id
 * @property integer $secretarias_id
 * @property string $veiculo_descricao
 * @property string $veiculo_placa
 * @property string $veiculo_chassi
 * @property integer $veiculo_tipo
 * @property integer $veiculo_quilometragem
 * @property string $veiculo_fabricante
 * @property string $veiculo_modelo
 * @property integer $prefeituras_id
 * @property integer $status_veiculos_id
 */
class Gg_veiculos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_veiculos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('veiculo_descricao, veiculo_placa, veiculo_tipo, prefeituras_id', 'required'),
			array('secretarias_id, status_veiculos_id, veiculo_tipo, veiculo_quilometragem', 'numerical', 'integerOnly'=>true),
                        array('veiculo_quilometragem', 'length', 'max'=>6),
			array('veiculo_descricao, veiculo_fabricante, veiculo_modelo', 'length', 'max'=>80),
			array('veiculo_placa', 'length', 'max'=>8),
			array('veiculo_chassi', 'length', 'max'=>17),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('veiculos_id, secretarias_id, starus_veiculos_id veiculo_descricao, veiculo_placa, veiculo_chassi, veiculo_tipo, veiculo_quilometragem, veiculo_fabricante, veiculo_modelo', 'safe', 'on'=>'search'),
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
                    'secretarias'=>array(self::BELONGS_TO, 'Gg_secretarias', 'secretarias_id'),
                    'tipos'=>array(self::BELONGS_TO, 'Gg_tipo_veiculos', 'veiculo_tipo'),
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
                    'status'=>array(self::BELONGS_TO, 'Gg_status_veiculos', 'status_veiculos_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'veiculos_id' => 'Veiculos',
			'secretarias_id' => 'Secretaria',
                        'secretarias.secretaria_nome' => 'Secretaria',
			'veiculo_descricao' => 'Descrição do Veículo',
			'veiculo_placa' => 'Placa',
			'veiculo_chassi' => 'Chassi',
			'veiculo_tipo' => 'Tipo',
                        'tipos.tipo_nome' => 'Tipo',
			'veiculo_quilometragem' => 'Quilometragem',
			'veiculo_fabricante' => 'Fabricante',
			'veiculo_modelo' => 'Modelo',
                        'status_veiculos_id' => 'Status',
                        'status.status_nome' => 'Status',
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

		$criteria->compare('veiculos_id',$this->veiculos_id);

		$criteria->compare('secretarias_id',$this->secretarias_id);
                
                $criteria->compare('status_veiculos_id',$this->status_veiculos_id);

		$criteria->compare('veiculo_descricao',$this->veiculo_descricao,true);

		$criteria->compare('veiculo_placa',$this->veiculo_placa,true);

		$criteria->compare('veiculo_chassi',$this->veiculo_chassi,true);

		$criteria->compare('veiculo_tipo',$this->veiculo_tipo);

		$criteria->compare('veiculo_quilometragem',$this->veiculo_quilometragem);

		$criteria->compare('veiculo_fabricante',$this->veiculo_fabricante,true);

		$criteria->compare('veiculo_modelo',$this->veiculo_modelo,true);
                
                $criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_veiculos', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_veiculos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
}