<?php

/**
 * This is the model class for table "Gg_usuarios".
 *
 * The followings are the available columns in table 'Gg_usuarios':
 * @property integer $usuarios_id
 * @property string $usuario_nome
 * @property string $usuario_login
 * @property string $usuario_senha
 * @property integer $perfis_id
 * @property string $usuario_email
 */
class Gg_usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_nome, usuario_login, usuario_senha, perfis_id, usuario_email', 'required'),
			array('perfis_id', 'numerical', 'integerOnly'=>true),
			array('usuario_nome, usuario_login', 'length', 'max'=>80),
			array('usuario_senha', 'length', 'max'=>128),
			array('usuario_email', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuarios_id, usuario_nome, usuario_login, usuario_senha, perfil.perfil_nome, secretarias.secretarias_id, usuario_email', 'safe', 'on'=>'search'),
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
                    'perfil'=>array(self::BELONGS_TO, 'Gg_perfil', 'perfis_id'),
                    'secretarias'=>array(self::MANY_MANY, 'Gg_usuarios_secretarias', 'Gg_usuarios_secretarias(usuarios_id, secretarias_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuarios_id' => 'Código',
			'usuario_nome' => 'Nome',
			'usuario_login' => 'Login',
			'usuario_senha' => 'Senha',
			'perfis_id' => 'Perfil',
                        'perfil.perfil_nome' => 'Perfil',
                        'secretarias.secretarias_id' => 'secretarias_id',
			'usuario_email' => 'Email',
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
                
                $criteria->with=array('perfil', 'secretarias');
                $criteria->together=true;

		$criteria->compare('usuarios_id',$this->usuarios_id);

		$criteria->compare('usuario_nome',$this->usuario_nome,true);

		$criteria->compare('usuario_login',$this->usuario_login,true);

		$criteria->compare('usuario_senha',  $this->usuario_senha,true);

		$criteria->compare('perfil.perfil_nome',$this->perfis_id);

		$criteria->compare('usuario_email',$this->usuario_email,true);
                
                $criteria->condition = 't.usuarios_id in (SELECT u.usuarios_id
                                                                        FROM Gg_usuarios_secretarias u
                                                                        WHERE u.secretarias_id = '.Yii::app()->session['active_secretarias_id'].')';
                

		return new CActiveDataProvider('Gg_usuarios', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Gg_usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}