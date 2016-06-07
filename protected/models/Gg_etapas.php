<?php

/**
 * This is the model class for table "Gg_etapas".
 *
 * The followings are the available columns in table 'Gg_etapas':
 * @property integer $etapas_id
 * @property integer $obras_id
 * @property integer $responsaveis_id
 * @property string $etapa_descricao
 * @property string $etapa_data_inicial
 * @property string $etapa_data_final
 * @property string $etapa_saldo
 * @property string $etapa_status
 * @property string $etapa_concluido
 * @property integer $prefeituras_id
 */
class Gg_etapas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_etapas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('obras_id, responsaveis_id, etapa_descricao, etapa_data_inicial, etapa_status, prefeituras_id', 'required'),
			array('obras_id, responsaveis_id, prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('etapa_descricao', 'length', 'max'=>2000),
			array('etapa_saldo, etapa_status', 'length', 'max'=>12),
			array('etapa_concluido', 'length', 'max'=>6),
			array('etapa_data_final', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('etapas_id, obras_id, responsaveis_id, etapa_descricao, etapa_data_inicial, etapa_data_final, etapa_saldo, etapa_status, etapa_concluido, prefeituras_id', 'safe', 'on'=>'search'),
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
                    'responsavel'=>array(self::BELONGS_TO, 'Gg_responsaveis', 'responsaveis_id'),
                    'obra'=>array(self::BELONGS_TO, 'Gg_obras', 'obras_id'),
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'etapas_id' => 'Etapa',
			'obras_id' => 'Obra',
                        'obra.obra_nome' => 'Obra',
			'responsaveis_id' => 'Responsável',
                        'responsavel.responsavel_nome' => 'Responsável',
			'etapa_descricao' => 'Descrição',
			'etapa_data_inicial' => 'Data de Início',
			'etapa_data_final' => 'Data de Término',
			'etapa_saldo' => 'Saldo (R$)',
			'etapa_status' => 'Status',
			'etapa_concluido' => 'Concluído (%)',
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

		$criteria->compare('etapas_id',$this->etapas_id);

		$criteria->compare('obras_id',$this->obras_id);

		$criteria->compare('responsaveis_id',$this->responsaveis_id);

		$criteria->compare('etapa_descricao',$this->etapa_descricao,true);

		$criteria->compare('etapa_data_inicial',$this->etapa_data_inicial,true);

		$criteria->compare('etapa_data_final',$this->etapa_data_final,true);

		$criteria->compare('etapa_saldo',$this->etapa_saldo,true);

		$criteria->compare('etapa_status',$this->etapa_status,true);

		$criteria->compare('etapa_concluido',$this->etapa_concluido,true);

		$criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_etapas', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_etapas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}