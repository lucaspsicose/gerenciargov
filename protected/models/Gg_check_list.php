<?php

/**
 * This is the model class for table "Gg_check_list".
 *
 * The followings are the available columns in table 'Gg_check_list':
 * @property integer $check_list_id
 * @property integer $veiculos_id
 * @property integer $buzina
 * @property integer $cinto
 * @property integer $retrovisor
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
 * @property integer $seta_dianteria
 * @property integer $seta_trazeira
 * @property integer $vidros
 * @property string $observacao
 * @property string $data_alteracao
 * @property integer $prefeituras_id
 */
class Gg_check_list extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_check_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('veiculos_id, prefeituras_id', 'required'),
			array('veiculos_id, buzina, cinto, retrovisor, farois, fluido_freio, freio, freio_mao, lataria, luz_freio, luz_re, luz_painel, nivel_agua, nivel_oleo, pneu, porta, seta_dianteria, seta_trazeira, vidros', 'numerical', 'integerOnly'=>true),
			array('observacao', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('check_list_id, veiculos_id, buzina, cinto, retrovisor, farois, fluido_freio, freio, freio_mao, lataria, luz_freio, luz_re, luz_painel, nivel_agua, nivel_oleo, pneu, porta, seta_dianteria, seta_trazeira, vidros, observacao, data_alteracao', 'safe', 'on'=>'search'),
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
			'check_list_id' => 'Check List',
			'veiculos_id' => 'Veículo',
                        'veiculos.veiculo_placa' => 'Veículo',
			'buzina' => 'Buzina',
			'cinto' => 'Cinto de Segurança',
			'retrovisor' => 'Retrovisor',
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
			'seta_dianteria' => 'Seta Dianteria',
			'seta_trazeira' => 'Seta Trazeira',
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

		$criteria->compare('check_list_id',$this->check_list_id);

		$criteria->compare('veiculos_id',$this->veiculos_id);

		$criteria->compare('buzina',$this->buzina);

		$criteria->compare('cinto',$this->cinto);

		$criteria->compare('retrovisor',$this->retrovisor);

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

		$criteria->compare('seta_dianteria',$this->seta_dianteria);

		$criteria->compare('seta_trazeira',$this->seta_trazeira);

		$criteria->compare('vidros',$this->vidros);

		$criteria->compare('observacao',$this->observacao,true);

		$criteria->compare('data_alteracao',$this->data_alteracao,true);
                
                $criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_check_list', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_check_list the static model class
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