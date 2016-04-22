<?php
class Functions extends CApplicationComponent
{	
        public $data;
	public $code=2;
	public $msg;
	public $details;
	public $db_ext;
	public $has_session=false;
	
	public function __construct()
	{
		$this->db_ext=new DbExt; 		
	}
	
	public function isAdminLogin()
	{						
		$is_login=FALSE;				
		/*if (!empty($_COOKIE['kr_user'])){
			$user=json_decode($_COOKIE['kr_user']);									
			if (is_numeric($user[0]->admin_id)){
				$is_login=TRUE;
			}
		}*/				
		if ($this->validateAdminSession()){
			return true;
		}			
		return false;
	}
        
        public function addUsuario($name = '', $login = '', $senha = '', $perfil = '', $email = '', $prefeituras_id = '', $secretarias) 
        {
            $params['usuario_nome']  = $name;
            $params['usuario_senha'] = md5($senha);
            $params['perfis_id']     = $perfil;
            $params['usuario_email'] = $email;
            $params['usuario_login'] = $login;
            $params['prefeituras_id']= $prefeituras_id;
            
            $insert = new DbExt();
            
            $insert->insertData('Gg_usuarios', $params);
            //$this->details=Yii::app()->db->getLastInsertID();
            $this->code=1;
            
            $user_id = Yii::app()->db->getLastInsertID();
            unset($params);
            
            if ($secretarias <> '') {
                foreach ($secretarias as  $key) {
                    $params['usuarios_id'] = $user_id;
                    $params['secretarias_id'] = $key;
                    $insert->insertData('Gg_usuarios_secretarias', $params);
                }
            }
            $this->msg=Yii::t("default","Usuário Gravado com Sucesso!");
            return TRUE;
            
        } 
        
        public function updateUsuario ($usuarios_id = '', $name = '', $login = '', $senha = '', $perfil = '', $email = '', $secretarias)
        {
            $params['usuario_nome']  = $name;
            
            if ($senha !== '') {
                $params['usuario_senha'] = md5($senha);
            }
            
            $params['perfis_id']     = $perfil;
            $params['usuario_email'] = $email;
            $params['usuario_login'] = $login;
            
            $update = new DbExt();
            
            $update->updateData('Gg_usuarios', $params, 'usuarios_id', $usuarios_id);
            
            unset($params);

            if ($secretarias <> '') {
                $sql = 'delete from Gg_usuarios_secretarias where usuarios_id = '.$usuarios_id;

                $update->qry($sql);

                foreach ($secretarias as  $key) {
                    $params['usuarios_id'] = $usuarios_id;
                    $params['secretarias_id'] = $key;
                    $update->insertData('Gg_usuarios_secretarias', $params);
                }
            }
            $this->msg=Yii::t("default","Usuário Gravado com Sucesso!");
            return TRUE;
        }        


        public function generateRandomKey($range=10) 
        {
                $chars = "0123456789";	
                srand((double)microtime()*1000000);	
                $i = 0;	
                $pass = '' ;	
                while ($i <= $range) {
                    $num = rand() % $range;	
                    $tmp = substr($chars, $num, 1);	
                    $pass = $pass . $tmp;	
                    $i++;	
                }
                return $pass;
        }
        
        public function getComboPerfil() {
            $db = new DbExt();
            
            $stmt = 'select perfis_id, '
                    . 'perfil_nome '
                    . 'from Gg_perfil '
                    . 'where perfil_capabilidade <> 0';
            
            $combo = array();
            $chave = array();
            $label = array();
            
            if ($res = $db->rst($stmt)) {
                foreach ($res as $key) {
                    array_push($chave, $key['perfis_id']);
                }
                
                foreach ($res as $key) {
                    array_push($label, $key['perfil_nome']);
                }
                
                $combo = array_combine($chave, $label);                        
                
            } 
            
            return $combo;
        }
        
        public function getComboStatus() {
            $db = new DbExt();
            
            $stmt = 'select status_id, '
                    . 'status_nome '
                    . 'from Gg_status';
            
            $combo = array();
            $chave = array();
            $label = array();
            
            if ($res = $db->rst($stmt)) {
                foreach ($res as $key) {
                    array_push($chave, $key['status_id']);
                }
                
                foreach ($res as $key) {
                    array_push($label, $key['status_nome']);
                }
                
                $combo = array_combine($chave, $label);                        
                
            } 
            
            return $combo;
        }
        
        public function getComboServicos($secretarias_id) {
            $db = new DbExt();
            
            $stmt = 'select servicos_id, '
                    . 'servico_nome '
                    . 'from Gg_servicos'
                    . 'where secretarias_id = ' .$secretarias_id;
            
            $combo = array();
            $chave = array();
            $label = array();
            
            if ($res = $db->rst($stmt)) {
                foreach ($res as $key) {
                    array_push($chave, $key['servicos_id']);
                }
                
                foreach ($res as $key) {
                    array_push($label, $key['servico_nome']);
                }
                
                $combo = array_combine($chave, $label);                        
                
            } 
            
            return $combo;
        }
        
        public function getComboSecretarias() {
            $db = new DbExt();
            
            $stmt = 'SELECT 0 AS secretarias_id, \'\' AS secretaria_nome FROM gg_secretarias LIMIT 1 '
                    . 'union all '
                    . 'select secretarias_id, secretaria_nome from Gg_secretarias';
            
            $combo = array();
            $chave = array();
            $label = array();
            
            if ($res = $db->rst($stmt)) {
                foreach ($res as $key) {
                    array_push($chave, $key['secretarias_id']);
                }
                
                foreach ($res as $key) {
                    array_push($label, $key['secretaria_nome']);
                }
                
                $combo = array_combine($chave, $label);                        
                
            } 
            
            return $combo;
        }
        
        public function  getSecretarias($user_id = '') 
        {
            $db = new DbExt();
            $stmt = 'select secretarias_id, secretaria_nome from Gg_secretarias';
            
            $values = array();
            $chave = array();
            $label = array();
            
            //$checkbox = CHtml::checkBoxList('secretarias_id', '', array($key['secretarias_id'] => $key['secretaria_nome']));
            if ($res = $db->rst($stmt)) {
                foreach ($res as $key) {
                   array_push($chave, $key['secretarias_id']);
                }
                
                foreach ($res as $key) {
                    array_push($label, $key['secretaria_nome']);
                }
                
                $values = array_combine($chave, $label);
                
                $checkbox = CHtml::checkBoxList ('secretarias', $this->getSecretariasByUsuario($user_id), $values);
                
            } return $checkbox;
        }

        public function logout() 
        {
            $session = Yii::app()->session;
            $session->destroy();
        }
        
        public function getSecretariasByUsuario($user_id = '') 
        {
            if ($user_id <> '') {
                $db = new DbExt();

                $sql = 'select secretarias_id from Gg_usuarios_secretarias where usuarios_id = '.$user_id;            

                $selected = array();

                if ($res = $db->rst($sql)) {
                    foreach ($res as $key) {
                        array_push($selected, $key['secretarias_id']);
                    }
                }

                return $selected;
            } else {
                return '';
            }
           
        }
        
        public function getDadosSecretarias($secretarias_id = '') 
        {
            if ($secretarias_id <> '') {
                $db = new DbExt();

                $sql = 'select * from Gg_secretarias where secretarias_id = '.$secretarias_id;            

                $secretarias = array();

                if ($res = $db->rst($sql)) {
                    foreach ($res as $key) {
                        $secretarias = $key;
                    }
                    return $secretarias;
                }
            } else {
                return '';
            }
        }
        
        public function generateProtocolo() 
        {
            $db = new DbExt();
            
            $sql = 'select max(atendimentos_id) from Gg_atendimentos';
            
            $id = $db->rst($sql);
            
            foreach ($id as $rest) {
                $cod = $rest['max(atendimentos_id)'];
            }
            
            $cod = $cod + 1;
            
            $cod = str_pad($cod, 4, "0", STR_PAD_LEFT);
            $protocolo = 'GS'.date('dmY').$cod.'BR';
            
            return $protocolo;
        }
        
        public function getSolicitantes($prefeituras_id = '')
        {
            $db = new DbExt();
            $sql = 'select solicitantes_id, solicitante_nome from Gg_solicitantes where prefeituras_id = '.$prefeituras_id;
            
            $cod   = array();
            $nome  = array();
            $array = array();
            $i = 0;
            
            if ($res = $db->rst($sql)) {
                foreach ($res as $key) {
                    array_push($cod, $key['solicitantes_id']);
                    array_push($nome, $key['solicitante_nome']);
                    array_push($array, $cod[$i].": ".$nome[$i]);
                    
                    $i++;
                }
            }
            
            return $array;
        }
        
        public function getSolicitanteNomeById($id) 
        {
            if (!$id == '') {    
                $db = new DbExt();
                $sql = 'select solicitante_nome from Gg_solicitantes where solicitantes_id = '.$id;

                if ($res = $db->rst($sql)) {
                    foreach ($res as $value) {
                        $result = $value['solicitante_nome'];
                    }

                    return $result;
                } 
            } else {
                return $id;
            }
        }
	
	}