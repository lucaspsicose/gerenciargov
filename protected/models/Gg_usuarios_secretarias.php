<?php

/**
 * This is the model class for table "gg_usuarios_secretarias".
 *
 * The followings are the available columns in table 'gg_usuarios_secretarias':
 * @property integer $usuarios_id
 * @property integer $secretarias_id
 */
class gg_usuarios_secretarias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Gg_usuarios_secretarias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuarios_id, secretarias_id', 'required'),
			array('usuarios_id, secretarias_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('usuarios_id, secretarias_id, sec.secretarias_id', 'safe', 'on'=>'search'),
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
                    'sec'=>array(self::BELONGS_TO, 'Gg_secretarias', 'secretarias_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usuarios_id' => 'Usuarios',
			'secretarias_id' => 'Secretarias',
                        'sec.secretaria_nome' => 'Secretaria',
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

		$criteria->compare('usuarios_id',$this->usuarios_id);

		$criteria->compare('secretarias_id',$this->secretarias_id);
                
                $criteria->compare('sec.secretarias_id', $this->secretarias_id);

		return new CActiveDataProvider('gg_usuarios_secretarias', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return gg_usuarios_secretarias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}