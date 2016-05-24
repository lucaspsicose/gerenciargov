<?php

/**
 * This is the model class for table "Gg_veiculo_viagens".
 *
 * The followings are the available columns in table 'Gg_veiculo_viagens':
 * @property integer $viagens_id
 * @property integer $veiculos_id
 * @property integer $motoristas_id
 * @property string $data_saida
 * @property integer $quilometragem_saida
 * @property string $hora_saida
 * @property string $destino
 * @property string $finalidade
 * @property string $data_chegada
 * @property integer $quilometragem_chegada
 * @property integer $quilometragem_rodada
 * @property string $hora_chegada
 * @property integer $avaira
 * @property integer $prefeituras_id
 */
class Gg_veiculo_viagens extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_veiculo_viagens';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('veiculos_id, motoristas_id, data_saida, quilometragem_saida, hora_saida, destino, finalidade, prefeituras_id', 'required'),
			array('veiculos_id, motoristas_id, quilometragem_saida, quilometragem_chegada, quilometragem_rodada, avaria', 'numerical', 'integerOnly'=>true),
			array('destino, finalidade', 'length', 'max'=>2000),
                        //array('data_saida', 'type', 'type' => 'date', 'message' => '{attribute}: não é uma data!','dateFormat'=>'DD-MM-YYYY'),
			array('data_chegada, hora_chegada', 'safe'),
                        /*array('data_saida','default',
                              'value'=>new CDbExpression(''),
                              'setOnEmpty'=>false,'on'=>'insert'),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('viagens_id, veiculos_id, motoristas_id, data_saida, quilometragem_saida, hora_saida, destino, finalidade, data_chegada, quilometragem_chegada, hora_chegada', 'safe', 'on'=>'search'),
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
                    'motorista'=>array(self::BELONGS_TO, 'Gg_motoristas', 'motoristas_id'),
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'viagens_id' => 'Viagem',
			'veiculos_id' => 'Veículo',
                        'veiculos.veiculo_descricao' => 'Veículo',
                        'veiculos.veiculo_placa' => 'Placa',
			'motoristas_id' => 'Motorista',
                        'motorista.motorista_nome' => 'Motorista',
			'data_saida' => 'Data Saída',
			'quilometragem_saida' => 'KM Saída',
			'hora_saida' => 'Hora Saída',
			'destino' => 'Destino',
                        'finalidade' => 'Finalidade',
			'data_chegada' => 'Data Chegada',
			'quilometragem_chegada' => 'km Chegada',
                        'quilometragem_rodada' => 'km Percorrida',
			'hora_chegada' => 'Hora Chegada',
                        'avaria' => 'Avarias?',
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

		$criteria->compare('viagens_id',$this->viagens_id);

		$criteria->compare('veiculos_id',$this->veiculos_id);

		$criteria->compare('motoristas_id',$this->motoristas_id);

		$criteria->compare('data_saida',$this->data_saida,true);

		$criteria->compare('quilometragem_saida',$this->quilometragem_saida);

		$criteria->compare('hora_saida',$this->hora_saida,true);

		$criteria->compare('destino',$this->destino,true);
                
                $criteria->compare('finalidade',$this->finalidade,true);

		$criteria->compare('data_chegada',$this->data_chegada,true);

		$criteria->compare('quilometragem_chegada',$this->quilometragem_chegada);
                
                $criteria->compare('quilometragem_rodada',$this->quilometragem_rodada);

		$criteria->compare('hora_chegada',$this->hora_chegada,true);
                
                $criteria->compare('avaria',$this->avaria,true);
                
                $criteria->compare('prefeituras_id',Yii::app()->session['active_prefeituras_id'],true);

		return new CActiveDataProvider('Gg_veiculo_viagens', array('sort'=>array(
                        'defaultOrder'=>'data_saida DESC',),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_veiculo_viagens the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeSave() {
            if ($this->isNewRecord) {
                $this->data_saida = date ('Y-m-d',strtotime($this->data_saida));
                $sql = 'update Gg_veiculos set status_veiculos_id = 2 where veiculos_id = '. $this->veiculos_id; 
                Yii::app()->db->createCommand($sql)->query();
            }else
            if (!$this->isNewRecord) {
                $this->data_saida = date ('Y-m-d',strtotime($this->data_saida));
                if($this->data_chegada != '' and $this->quilometragem_chegada != '' and $this->hora_chegada != ''){
                    $sql = 'update Gg_veiculos set status_veiculos_id = 1 where veiculos_id = '. $this->veiculos_id; 
                    Yii::app()->db->createCommand($sql)->query();
                }
            }
            return parent::beforeSave();
        }
        
        protected function afterDelete() {
                $sql = 'update Gg_veiculos set status_veiculos_id = 1 where veiculos_id = '. $this->veiculos_id; 
                Yii::app()->db->createCommand($sql)->query();
            return parent::afterDelete();
        }
        
        protected function afterFind ()
        {
            //Está comentado por causa do datefield 
            // convert to display format
            /*$this->data_saida = strtotime ($this->data_saida);
            $this->data_saida = date ('d/m/Y', $this->data_saida);
            
            $this->data_chegada = strtotime ($this->data_chegada);
            $this->data_chegada = date ('d/m/Y', $this->data_chegada);*/
            
            parent::afterFind ();
        }
}