<?php

/**
 * This is the model class for table "Gg_checklist_viagem".
 *
 * The followings are the available columns in table 'Gg_checklist_viagem':
 * @property integer $checklist_viagens_id
 * @property integer $viagens_id
 * @property integer $buzina
 * @property integer $cinto
 * @property integer $retrovisor_e
 * @property integer $retrovisor_d
 * @property integer $farois
 * @property integer $fluido_freio
 * @property integer $freio
 * @property integer $freio_mao
 * @property integer $lataria
 * @property integer $luz_freio
 * @property integer $luz_re
 * @property integer $luz_painel
 * @property integer $nivel_agua
 * @property integer $nivel_oleo
 * @property integer $pneu
 * @property integer $porta
 * @property integer $seta_dianteira_e
 * @property integer $seta_dianteira_d
 * @property integer $seta_traseira_e
 * @property integer $seta_traseira_d
 * @property integer $vidros
 * @property string $observacao
 * @property string $data_alteracao
 * @property integer $prefeituras_id
 */
class Gg_checklist_viagem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_checklist_viagem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('viagens_id, prefeituras_id', 'required'),
			array('viagens_id, buzina, cinto, retrovisor_e, retrovisor_d, farois, fluido_freio, freio, freio_mao, lataria, luz_freio, luz_re, luz_painel, nivel_agua, nivel_oleo, pneu, porta, seta_dianteira_e, seta_dianteira_d, seta_traseira_e, seta_traseira_d, vidros, prefeituras_id', 'numerical', 'integerOnly'=>true),
			array('observacao', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('checklist_viagens_id, viagens_id, buzina, cinto, retrovisor_e, retrovisor_d, farois, fluido_freio, freio, freio_mao, lataria, luz_freio, luz_re, luz_painel, nivel_agua, nivel_oleo, pneu, porta, seta_dianteira_e, seta_dianteira_d, seta_traseira_e, seta_traseira_d, vidros, observacao, data_alteracao, prefeituras_id', 'safe', 'on'=>'search'),
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
                    'viagens'=>array(self::BELONGS_TO, 'Gg_veiculo_viagens', 'viagens_id'),
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'checklist_viagens_id' => 'Checklist',
			'viagens_id' => 'Viagem',
                        'viagens.veiculos.veiculo_placa' => 'Veículo',
			'buzina' => 'Buzina',
			'cinto' => 'Cinto de Segurança',
			'retrovisor_e' => 'Retrovisor Esq.',
                        'retrovisor_d' => 'Retrovisor Dir.',
			'farois' => 'Farois',
			'fluido_freio' => 'Fluido de Freio',
			'freio' => 'Freio',
			'freio_mao' => 'Freio Mao',
			'lataria' => 'Lataria',
			'luz_freio' => 'Luz de Freio',
			'luz_re' => 'Luz de Ré',
			'luz_painel' => 'Luzes no Painel',
			'nivel_agua' => 'Nível da Água',
			'nivel_oleo' => 'Nível do Óleo',
			'pneu' => 'Pneus',
			'porta' => 'Portas',
			'seta_dianteira_e' => 'Seta Dianteira Esq.',
                        'seta_dianteira_d' => 'Seta Dianteira Dir.',
			'seta_traseira_e' => 'Seta Traseira Esq.',
                        'seta_traseira_d' => 'Seta Traseira Dir.',
			'vidros' => 'Vidros',
			'observacao' => 'Observação',
			'data_alteracao' => 'Data',
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

		$criteria->compare('checklist_viagens_id',$this->checklist_viagens_id);

		$criteria->compare('viagens_id',$this->viagens_id);

		$criteria->compare('buzina',$this->buzina);

		$criteria->compare('cinto',$this->cinto);

		$criteria->compare('retrovisor_e',$this->retrovisor_e);

		$criteria->compare('retrovisor_d',$this->retrovisor_d);

		$criteria->compare('farois',$this->farois);

		$criteria->compare('fluido_freio',$this->fluido_freio);

		$criteria->compare('freio',$this->freio);

		$criteria->compare('freio_mao',$this->freio_mao);

		$criteria->compare('lataria',$this->lataria);

		$criteria->compare('luz_freio',$this->luz_freio);

		$criteria->compare('luz_re',$this->luz_re);

		$criteria->compare('luz_painel',$this->luz_painel);

		$criteria->compare('nivel_agua',$this->nivel_agua);

		$criteria->compare('nivel_oleo',$this->nivel_oleo);

		$criteria->compare('pneu',$this->pneu);

		$criteria->compare('porta',$this->porta);

		$criteria->compare('seta_dianteira_e',$this->seta_dianteira_e);

		$criteria->compare('seta_dianteira_d',$this->seta_dianteira_d);

		$criteria->compare('seta_traseira_e',$this->seta_traseira_e);

		$criteria->compare('seta_traseira_d',$this->seta_traseira_d);

		$criteria->compare('vidros',$this->vidros);

		$criteria->compare('observacao',$this->observacao,true);

		$criteria->compare('data_alteracao',$this->data_alteracao,true);

		$criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_checklist_viagem', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_checklist_viagem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function afterFind ()
        {
                // convert to display format
            $this->data_alteracao = strtotime ($this->data_alteracao);
            $this->data_alteracao = date ('d/m/Y H:m', $this->data_alteracao);
            
            /*if($this->buzina == 1){
                $this->buzina = 'X';
            }*/

            parent::afterFind ();
        }
        protected function beforeSave() {
            if (!$this->isNewRecord) {
                $this->data_alteracao = date ('Y-m-d H:m', time());
            }
            return parent::beforeSave();
        }
}