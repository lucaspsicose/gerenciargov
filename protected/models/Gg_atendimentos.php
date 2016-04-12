<?php

/**
 * This is the model class for table "Gg_atendimentos".
 *
 * The followings are the available columns in table 'Gg_atendimentos':
 * @property integer $atendimentos_id
 * @property integer $usuarios_id
 * @property integer $secretarias_id
 * @property string $atendimento_protocolo
 * @property integer $status_id
 * @property string $atendimento_descricao
 * @property string $atendimento_inclusao
 * @property string $atendimento_alteracao
 * @property integer $solicitantes_id
 * @property string $atendimento_descricao_status
 * @property string $atendimento_endereco
 * @property string $atendimento_numero
 * @property string $atendimento_bairro
 * @property integer $secretarias_origem_id
 */
class Gg_atendimentos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
         
	public function tableName()
	{
		return 'Gg_atendimentos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuarios_id, secretarias_id, atendimento_protocolo, status_id, atendimento_descricao, solicitantes_id, atendimento_endereco, atendimento_numero, atendimento_bairro, secretarias_origem_id', 'required'),
			array('usuarios_id, secretarias_id, status_id, solicitantes_id, servicos_id, secretarias_origem_id', 'numerical', 'integerOnly'=>true),
			array('atendimento_protocolo', 'length', 'max'=>50),
			array('atendimento_descricao, atendimento_descricao_status, atendimento_endereco', 'length', 'max'=>2000),
			array('atendimento_numero', 'length', 'max'=>10),
			array('atendimento_bairro', 'length', 'max'=>60),
                        array('atendimento_alteracao','default',
                              'value'=>new CDbExpression('NOW()'),
                              'setOnEmpty'=>false,'on'=>array('insert', 'update')),      
                        array('atendimento_inclusao','default',
                              'value'=>new CDbExpression('NOW()'),
                              'setOnEmpty'=>false,'on'=>'insert'),
			//array('atendimento_alteracao', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('atendimentos_id, usuarios_id, secretarias_id, atendimento_protocolo, status_id, atendimento_descricao, atendimento_inclusao, atendimento_alteracao, solicitantes_id, solicitantes.solicitante_nome, atendimento_descricao_status, atendimento_endereco, atendimento_numero, atendimento_bairro, secretarias_origem_id, sec_origem.secretaria_nome, usuarios.usuario_nome', 'safe', 'on'=>'search'),
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
                    'status'=>array(self::BELONGS_TO, 'Gg_status', 'status_id'),
                    'servicos'=>array(self::BELONGS_TO, 'Gg_servicos', 'servicos_id'),
                    'solicitantes'=>array(self::BELONGS_TO, 'Gg_solicitantes', 'solicitantes_id'),
                    'sec_origem'=>array(self::BELONGS_TO, 'Gg_secretarias', 'secretarias_origem_id'),
                    'usuarios'=>array(self::BELONGS_TO, 'Gg_usuarios', 'usuarios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'atendimentos_id' => 'Código',
			'usuarios_id' => 'Usuário',
                        'usuarios.usuario_nome'=> 'Servidor',
			'secretarias_id' => 'Secretaria',
			'atendimento_protocolo' => 'Protocolo',
			'status_id' => 'Status',
			'atendimento_descricao' => 'Descrição',
			'atendimento_inclusao' => 'Data do Atendimento',
			'atendimento_alteracao' => 'Última Alteração',
			'solicitantes_id' => 'Solicitante',
			'atendimento_descricao_status' => 'Descrição do Status',
			'atendimento_endereco' => 'Endereço para Atendimento',
			'atendimento_numero' => 'Número',
			'atendimento_bairro' => 'Bairro para Atendimento',
                        'status.status_nome' => 'Status',
                        'servicos.servico_nome' => 'Serviço',
                        'servicos_id' => 'Serviço', 
                        'solicitantes.solicitante_nome'=>'Solicitante',
                        'secretarias_origem_id'=>'Secretaria de Origem',
                        'sec_origem.secretaria_nome'=>'Secretaria de Origem',
                        'secretarias.secretaria_nome'=>'Secretaria',
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
                
                $criteria->with=array('secretarias', 'status', 'servicos', 'solicitantes');

		$criteria->compare('atendimentos_id',$this->atendimentos_id);

		$criteria->compare('usuarios_id',$this->usuarios_id);

		$criteria->compare('secretarias_id',$this->secretarias_id);

		$criteria->compare('atendimento_protocolo',$this->atendimento_protocolo,true);

		$criteria->compare('status_id',$this->status_id);

		$criteria->compare('atendimento_descricao',$this->atendimento_descricao,true);

		$criteria->compare('atendimento_inclusao',$this->atendimento_inclusao,true);

		$criteria->compare('atendimento_alteracao',$this->atendimento_alteracao,true);

		$criteria->compare('solicitantes_id',$this->solicitantes_id);

		$criteria->compare('atendimento_descricao_status',$this->atendimento_descricao_status,true);

		$criteria->compare('atendimento_endereco',$this->atendimento_endereco,true);

		$criteria->compare('atendimento_numero',$this->atendimento_numero,true);

		$criteria->compare('atendimento_bairro',$this->atendimento_bairro,true);
                
                $criteria->compare('solicitantes.solicitante_nome', $this->solicitantes_id, true);
                
                $criteria->compare('secretarias_origem_id', $this->secretarias_origem_id, true);
                
                $criteria->compare('sec_origem.secretaria_nome', $this->secretarias_origem_id, true);
                
                $criteria->compare('usuarios.usuario_nome', $this->usuarios_id, true);
                
                $criteria->condition = 'secretarias_origem_id = '.Yii::app()->session['active_secretarias_id'];

		return new CActiveDataProvider('Gg_atendimentos', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_atendimentos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function afterFind ()
        {
                // convert to display format
            $this->atendimento_inclusao = strtotime ($this->atendimento_inclusao);
            $this->atendimento_inclusao = date ('d/m/Y', $this->atendimento_inclusao);
            
            $this->atendimento_alteracao = strtotime ($this->atendimento_alteracao);
            $this->atendimento_alteracao = date ('d/m/Y H:m', $this->atendimento_alteracao);

            parent::afterFind ();
        }

        protected function beforeValidate ()
        {
                // convert to storage format
            $this->atendimento_inclusao = strtotime ($this->atendimento_inclusao);
            $this->atendimento_inclusao = date ('Y-m-d', $this->atendimento_inclusao);
            
            $this->atendimento_alteracao = strtotime ($this->atendimento_alteracao);
            $this->atendimento_alteracao = date ('d/m/Y H:m', $this->atendimento_alteracao);

            return parent::beforeValidate ();
        }
}