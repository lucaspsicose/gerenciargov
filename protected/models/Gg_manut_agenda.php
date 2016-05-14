<?php

/**
 * This is the model class for table "Gg_manut_agenda".
 *
 * The followings are the available columns in table 'Gg_manut_agenda':
 * @property integer $manut_agendas_id
 * @property integer $veiculos_id
 * @property string $manut_agenda_descricao
 * @property string $manut_agenda_data
 * @property integer $manut_agenda_quilometragem
 * @property string $alertando
 * @property integer $prefeituras_id
 */
class Gg_manut_agenda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_manut_agenda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('veiculos_id, manut_agenda_descricao, prefeituras_id', 'required'),
			array('veiculos_id, manut_agenda_quilometragem, prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('manut_agenda_descricao', 'length', 'max'=>2000),
                        array('alertando', 'length', 'max'=>3),
			array('manut_agenda_data', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('manut_agendas_id, veiculos_id, manut_agenda_descricao, manut_agenda_data, manut_agenda_quilometragem, alertando, prefeituras_id', 'safe', 'on'=>'search'),
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
			'manut_agendas_id' => 'ID',
			'veiculos_id' => 'Veículo',
                        'veiculos.veiculo_descricao' => 'Veículo',
                        'veiculos.veiculo_placa' => 'Placa',
			'manut_agenda_descricao' => 'Descrição',
			'manut_agenda_data' => 'Data',
			'manut_agenda_quilometragem' => 'KM',
			'alertando' => 'Em Alerta?',
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

		$criteria->compare('manut_agendas_id',$this->manut_agendas_id);

		$criteria->compare('veiculos_id',$this->veiculos_id);

		$criteria->compare('manut_agenda_descricao',$this->manut_agenda_descricao,true);

		$criteria->compare('manut_agenda_data',$this->manut_agenda_data,true);

		$criteria->compare('manut_agenda_quilometragem',$this->manut_agenda_quilometragem);

		$criteria->compare('alertando',$this->alertando,true);
                
                $criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_manut_agenda', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_manut_agenda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}