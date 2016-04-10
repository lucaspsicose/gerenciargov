<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */

class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
        public $captha;
        public $data;
        public $msg;

        private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Lembrar-me',
		);
	}
        
        /**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
        
        public function login()
		{			
			$DbExt=new DbExt;
			$stmt=" SELECT u.*,
                                       p.perfil_capabilidade 
                                  FROM Gg_usuarios u
                                  JOIN Gg_perfil   p on (p.perfis_id = u.perfis_id)
                                WHERE
                                usuario_login=".Yii::app()->db->quoteValue($this->data['username'])."
                                AND
                                usuario_senha=".Yii::app()->db->quoteValue(md5($this->data['password']))."
                                LIMIT 0,1
			";
                        $session = Yii::app()->session;
			if ( $res=$DbExt->rst($stmt)){
                            foreach ($res as $key) {
                                $session['user_id']             =$key['usuarios_id'];
				$session['usuario']             =$key['usuario_nome'];
                                $session['perfil']              = $key['perfil_capabilidade'];
                                $session['usuario_email']       =$key['usuario_email'];
                                $session['usuario_secretarias'] = Yii::app()->functions->getSecretariasByUsuario($key['usuarios_id']);
                                $session['active_prefeituras_id'] = $key['prefeituras_id'];
                            }
				
                                $function = new Functions();
				$session_token=$function->generateRandomKey().md5($_SERVER['REMOTE_ADDR']);				
				$params=array(
				  'session_token'=>$session_token,
				  'last_login'=>date('c')
				);
								
				$session['user_session']=$session_token;
				
	    		$this->msg=Yii::t("default","Login Com Sucesso!");
                        $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
                        $this->_identity = new UserIdentity($this->data['username'], $this->data['password']);
			Yii::app()->user->login($this->_identity,$duration);
                            return TRUE;
			} else { 
                                $this->msg=Yii::t("default","O Usuário ou senha estão inválidos.");
                                return FALSE;
                        }
		}
}
