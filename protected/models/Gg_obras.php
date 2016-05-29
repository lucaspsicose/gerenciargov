<?php

/**
 * This is the model class for table "Gg_obras".
 *
 * The followings are the available columns in table 'Gg_obras':
 * @property integer $obras_id
 * @property integer $responsaveis_id
 * @property string $obra_nome
 * @property string $obra_descricao
 * @property string $obra_local
 * @property string $obra_orc_previsto
 * @property string $obra_prev_inicial
 * @property string $obra_prev_final
 * @property string $obra_saldo
 * @property string $obra_data_inicial
 * @property string $obra_data_final
 * @property integer $obra_qte_etapa
 * @property string $obra_porc_etapa
 * @property string $obra_concluido
 * @property string $status_obra
 * @property integer $prefeituras_id
 */
class Gg_obras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_obras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('responsaveis_id, obra_nome, obra_descricao, obra_local, prefeituras_id', 'required'),
			array('responsaveis_id, obra_qte_etapa, prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('obra_nome, obra_local', 'length', 'max'=>200),
			array('obra_descricao', 'length', 'max'=>2000),
			array('obra_orc_previsto, obra_saldo, status_obra', 'length', 'max'=>12),
			array('obra_porc_etapa, obra_concluido', 'length', 'max'=>6),
			array('obra_prev_inicial, obra_prev_final, obra_data_inicial, obra_data_final', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('obras_id, responsaveis_id, obra_nome, obra_descricao, obra_local, obra_orc_previsto, obra_prev_inicial, obra_prev_final, obra_saldo, obra_data_inicial, obra_data_final, obra_qte_etapa, obra_porc_etapa, obra_concluido, status_obra, prefeituras_id', 'safe', 'on'=>'search'),
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
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'obras_id' => 'Obra',
			'responsaveis_id' => 'Responsável',
			'obra_nome' => 'Obra',
			'obra_descricao' => 'Descricao',
			'obra_local' => 'Local',
			'obra_orc_previsto' => 'Orçamento Previsto (R$)',
			'obra_prev_inicial' => 'Previsão de Início',
			'obra_prev_final' => 'Previsão de Término',
			'obra_saldo' => 'Saldo (R$)',
			'obra_data_inicial' => 'Data de Início',
			'obra_data_final' => 'Data de Término',
			'obra_qte_etapa' => 'Numero de Etapas',
			'obra_porc_etapa' => 'Porcentagem por Etapa (%)',
			'obra_concluido' => 'Concluído (%)',
                        'status_obra' => 'Status',
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

		$criteria->compare('obras_id',$this->obras_id);

		$criteria->compare('responsaveis_id',$this->responsaveis_id);

		$criteria->compare('obra_nome',$this->obra_nome,true);

		$criteria->compare('obra_descricao',$this->obra_descricao,true);

		$criteria->compare('obra_local',$this->obra_local,true);

		$criteria->compare('obra_orc_previsto',$this->obra_orc_previsto,true);

		$criteria->compare('obra_prev_inicial',$this->obra_prev_inicial,true);

		$criteria->compare('obra_prev_final',$this->obra_prev_final,true);

		$criteria->compare('obra_saldo',$this->obra_saldo,true);

		$criteria->compare('obra_data_inicial',$this->obra_data_inicial,true);

		$criteria->compare('obra_data_final',$this->obra_data_final,true);

		$criteria->compare('obra_qte_etapa',$this->obra_qte_etapa);

		$criteria->compare('obra_porc_etapa',$this->obra_porc_etapa,true);

		$criteria->compare('obra_concluido',$this->obra_concluido,true);
                
                $criteria->compare('status_obra',$this->status_obra,true);

		$criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_obras', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_obras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}