<?php

/**
 * This is the model class for table "Gg_solicitantes".
 *
 * The followings are the available columns in table 'Gg_solicitantes':
 * @property integer $solicitantes_id
 * @property string $solicitante_nome
 * @property string $solicitante_telefone
 * @property string $solicitante_celular
 * @property string $solicitante_cpf_cnpj
 * @property string $solicitante_endereco
 * @property string $solicitante_numero
 * @property string $solicitante_bairro
 * @property string $solicitante_email
 * @property string $solicitante_data_nascimento
 * @property string $solicitante_rg
 * @property string $solicitante_titulo_eleitor
 * @property integer $prefeituras_id
 */
class Gg_solicitantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_solicitantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('solicitante_nome, solicitante_telefone, solicitante_celular, solicitante_cpf_cnpj, solicitante_endereco, solicitante_numero, solicitante_bairro, solicitante_data_nascimento, solicitante_rg, solicitante_titulo_eleitor, prefeituras_id', 'required'),
			array('solicitante_nome, solicitante_endereco, solicitante_email', 'length', 'max'=>80),
			array('solicitante_telefone, solicitante_celular, solicitante_numero', 'length', 'max'=>15),
			array('solicitante_cpf_cnpj', 'length', 'max'=>16),
			array('solicitante_bairro', 'length', 'max'=>60),
			array('solicitante_rg, solicitante_titulo_eleitor', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('solicitantes_id, solicitante_nome, solicitante_telefone, solicitante_celular, solicitante_cpf_cnpj, solicitante_endereco, solicitante_numero, solicitante_bairro, solicitante_email, solicitante_data_nascimento, solicitante_rg, solicitante_titulo_eleitor, prefeituras_id, prefeituras.prefeitura_nome', 'safe', 'on'=>'search'),
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
                    'prefeituras'=>array(self::BELONGS_TO, 'Gg_prefeituras', 'prefeituras_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'solicitantes_id' => 'Código',
			'solicitante_nome' => 'Nome (Completo)',
			'solicitante_telefone' => 'Telefone',
			'solicitante_celular' => 'Celular',
			'solicitante_cpf_cnpj' => 'CPF/CNPJ',
			'solicitante_endereco' => 'Endereço',
			'solicitante_numero' => 'Número',
			'solicitante_bairro' => 'Bairro',
			'solicitante_email' => 'Email',
			'solicitante_data_nascimento' => 'Data de Nascimento',
			'solicitante_rg' => 'RG',
			'solicitante_titulo_eleitor' => 'Titulo de Eleitor',
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

		$criteria->compare('solicitantes_id',$this->solicitantes_id);

		$criteria->compare('solicitante_nome',$this->solicitante_nome,true);

		$criteria->compare('solicitante_telefone',$this->solicitante_telefone,true);

		$criteria->compare('solicitante_celular',$this->solicitante_celular,true);

		$criteria->compare('solicitante_cpf_cnpj',$this->solicitante_cpf_cnpj,true);

		$criteria->compare('solicitante_endereco',$this->solicitante_endereco,true);

		$criteria->compare('solicitante_numero',$this->solicitante_numero,true);

		$criteria->compare('solicitante_bairro',$this->solicitante_bairro,true);

		$criteria->compare('solicitante_email',$this->solicitante_email,true);

		$criteria->compare('solicitante_data_nascimento',$this->solicitante_data_nascimento,true);

		$criteria->compare('solicitante_rg',$this->solicitante_rg,true);

		$criteria->compare('solicitante_titulo_eleitor',$this->solicitante_titulo_eleitor,true);
                
                $criteria->compare('prefeituras_id', Yii::app()->session['active_prefeituras_id'], true);
                
                $criteria->compare('prefeituras.prefeitura_nome', $this->prefeituras_id, true);
                
                //$criteria->condition = 't.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];

		return new CActiveDataProvider('Gg_solicitantes', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_solicitantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeSave() {
                
                $this->solicitante_data_nascimento = strtotime($this->solicitante_data_nascimento);
                
                $this->solicitante_data_nascimento = date ('Y-m-d', $this->solicitante_data_nascimento);                
                
            return parent::beforeSave();
        }
}