<?php

/* 
 * Classe controller do módulo de Relatórios
 */

class RelatoriosController extends Controller 
{   
    
    public $layout='//layouts/column2';
    
    public function accessRules()
	{
		return array(
		);
	}
        
    public function actionIndex()
    {
        $this->render('main');
    }
    
    public function actionMain()
    {
        $this->render('main');
    }
    
    public function actionAtendimentos() 
    {
        $this->render('relatorios_atendimentos');
    }
    
    public function actionViagens()
    {
        $this->render('relatorios_viagens');
    }

    public function actionAniversariantes() 
    {   
        if (isset($_GET['mes'])) {
                $mes_aniversario = $_GET['mes'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAniversariantesMes($mes_aniversario);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        
    }
    
    public function actionMunicipes()
    {
        if (isset($_GET['nome'])) {
                $nome_municipe = $_GET['nome'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getMunicipes($nome_municipe);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionAtendimentosPorSolicitantes()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAtendimentoPorSolicitante($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionAtendimentosPorSecretarias()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAtendimentoPorSecretarias($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionAtendimentosPorUsuario()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAtendimentoPorUsuarios($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionAtendimentosPorData()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAtendimentoPorUsuarios($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionMotoristas()
    {
        if (isset($_GET['nome'])) {
                $nome_motorista = $_GET['nome'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getMotoristas($nome_motorista);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionVeiculos()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getveiculos($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionManutencoesPorVeiculos()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getManutencoesPorVeiculos($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionAbastecimentosPorVeiculos()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAbastecimentosPorVeiculos($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionViagensPorVeiculos()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getViagensPorVeiculos($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionViagensPorMotoristas()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getViagensPorMotoristas($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionVeiculosSintetico()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getveiculosSintetico($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function actionAgenda()
    {
        if (isset($_GET['Filtros'])) {
                $filtros = array();
                $filtros = $_GET['Filtros'];
                $html2pdf = Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAgenda($filtros);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
    }
    
    public function getAniversariantesMes($mes_aniversario = '')
    {
        $db = new DbExt();
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $sql = 'SELECT s.solicitante_nome,'
                . '    s.solicitante_endereco,'
                . '    s.solicitante_numero,'
                . '    s.solicitante_bairro,'
                . '    s.solicitante_telefone,'
                . '    s.solicitante_celular,'
                . '    s.solicitante_email,'
                . '    s.solicitante_data_nascimento'
                . ' FROM Gg_solicitantes s'
                . ' WHERE Month(s.solicitante_data_nascimento) = '.$mes_aniversario;
        
        $html.= '<div style="float: left; width:100%">
                 <hr>
                 <table style="border-style:solid; padding-bottom:5px;">
                     <tbody>
                     <tr align="center">
                         <td><strong>Munícipe</strong></td>
                         <td><strong>Telefone</strong></td>
                         <td><strong>Celular</strong></td>
                         <td><strong>Email</strong></td>
                         <td><strong>Data Nascimento</strong></td>
                     </tr>';
        
        $i = 0;
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) == 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .= '  <td>'.$value['solicitante_nome'].'</td>
                            <td>'.$value['solicitante_telefone'].'</td>
                            <td>'.$value['solicitante_celular'].'</td>
                            <td>'.$value['solicitante_email'].'</td>
                            <td>'.$value['solicitante_data_nascimento'].'</td>
                        </tr>';
                
                $i++;
            }
        }
        
        $html .= '</tbody>
                </table>
                    </div>
                </div>  
            </body>
        </html>';
        
        
        return $html;
        
    }
    
    public function getMunicipes($solicitante_nome = '')
    {
        $db = new DbExt();
        
        $html = Yii::app()->functions->getCabecalhoRelatorios(); 
        
        $html .= '<div style="float: left; width:100%">
                 <hr>
                 <table style="border-style:solid; padding-bottom:5px;">
                     <tbody>
                     <tr align="center">
                         <td><strong>Nome</strong></td>
                         <td><strong>Endereço</strong></td>
                         <td><strong>Telefone</strong></td>
                     </tr>';
        
        $sql = 'SELECT s.solicitante_nome,'
                . '    s.solicitante_endereco,'
                . '    s.solicitante_numero,'
                . '    s.solicitante_bairro,'
                . '    COALESCE(s.solicitante_celular, s.solicitante_telefone) as telefone,'
                . '    s.solicitante_email'
                . ' FROM Gg_solicitantes s'
                . ' WHERE 1 = 1';
        
        if ($solicitante_nome != '') {
            $sql .= ' AND solicitante_nome LIKE "%'.$solicitante_nome.'%"';
        }
        
        $sql .= ' ORDER BY s.solicitante_nome ASC';
        
        $i = 0;
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) == 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=   '<td>'.$value['solicitante_nome'].'</td>
                            <td>'.$value['solicitante_endereco'].' nº '.$value['solicitante_numero'].' '.$value['solicitante_bairro'].'</td>
                            <td>'.$value['telefone'].'</td>
                        </tr>';
                $i++;
            }
        }
        
        $html .= '</tbody>
                </table>
                    </div>
                </div>  
            </body>
        </html>';
        
        
        return $html;
    }
    
    public function getConteudoRelatoriosAtendimento($solicitantes_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT a.atendimento_protocolo, 
                        st.status_nome, 
                         sc.secretaria_nome, 
                         a.descricao_servico,
                         CASE
                          WHEN a.status_id =4
                           THEN cast( a.atendimento_alteracao AS date )
                          ELSE 'Não Terminado' 
                         END AS conclusao
                  FROM Gg_atendimentos a
                  JOIN Gg_solicitantes s ON (s.solicitantes_id = a.solicitantes_id )
                  JOIN Gg_status st ON ( a.status_id = st.status_id )
                  JOIN Gg_secretarias sc ON ( a.secretarias_id = sc.secretarias_id )
                  WHERE 1 = 1
                    AND a.solicitantes_id = ".$solicitantes_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY a.atendimento_inclusao";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td>'.$value['atendimento_protocolo'].'</td>
                           <td>'.$value['status_nome'].'</td>
                           <td>'.substr($value['secretaria_nome'], 0, 31).'</td>
                           <td>'.substr($value['descricao_servico'], 0, 31).'</td>
                           <td>'.$value['conclusao'].'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getConteudoRelatoriosAtendimentoSecretaria($secretarias_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT a.atendimento_protocolo, 
                        st.status_nome, 
                         s.solicitante_nome, 
                         a.descricao_servico,
                         CASE
                          WHEN a.status_id =4
                           THEN cast( a.atendimento_alteracao AS date )
                          ELSE 'Não Terminado' 
                         END AS conclusao
                  FROM Gg_atendimentos a
                  JOIN Gg_solicitantes s ON (s.solicitantes_id = a.solicitantes_id )
                  JOIN Gg_status st ON ( a.status_id = st.status_id )
                  JOIN Gg_secretarias sc ON ( a.secretarias_id = sc.secretarias_id )
                  WHERE 1 = 1
                    AND sc.secretarias_id = ".$secretarias_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY a.atendimento_inclusao";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td>'.$value['atendimento_protocolo'].'</td>
                           <td>'.$value['status_nome'].'</td>
                           <td>'.substr($value['solicitante_nome'], 0, 31).'</td>
                           <td>'.substr($value['descricao_servico'], 0, 31).'</td>
                           <td>'.$value['conclusao'].'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getConteudoRelatoriosAtendimentoUsuarios($usuarios_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT a.atendimento_protocolo, 
                        st.status_nome, 
                         s.solicitante_nome, 
                         sc.secretaria_nome,
                         CASE
                          WHEN a.status_id =4
                           THEN cast( a.atendimento_alteracao AS date )
                          ELSE 'Não Terminado' 
                         END AS conclusao
                  FROM Gg_atendimentos a
                  JOIN Gg_solicitantes s ON (s.solicitantes_id = a.solicitantes_id )
                  JOIN Gg_status st ON ( a.status_id = st.status_id )
                  JOIN Gg_secretarias sc ON ( a.secretarias_id = sc.secretarias_id )
                  WHERE 1 = 1
                    AND a.usuarios_id = ".$usuarios_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY a.atendimento_inclusao";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td>'.$value['atendimento_protocolo'].'</td>
                           <td>'.$value['status_nome'].'</td>
                           <td>'.substr($value['solicitante_nome'], 0, 31).'</td>
                           <td>'.substr($value['secretaria_nome'], 0, 31).'</td>
                           <td>'.$value['conclusao'].'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getAtendimentoPorSolicitante($filtros)
    {
        $db = new DbExt();
        
        $status_id        = $filtros['status_id'];
        $secretarias_id   = $filtros['secretarias_id'];
        $solicitante_nome = $filtros['solicitante_nome'];
        $atendimento_inclusao = $filtros['atendimento_inclusao'];
        
        $sql = 'SELECT s.solicitante_nome,'
                . '    a.solicitantes_id'
                . ' FROM Gg_atendimentos a '
                . ' JOIN Gg_solicitantes s ON (s.solicitantes_id = a.solicitantes_id)'
                . ' JOIN Gg_secretarias sc ON (sc.secretarias_id = a.secretarias_id)'
                . ' WHERE sc.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($status_id != '') {
            $params .= ' AND a.status_id = '.$status_id;
        }
        
        if ($secretarias_id != '') {
            $params .= ' AND a.secretarias_id = '.$secretarias_id;
        }
        
        if ($solicitante_nome != '') {
            $params .= ' AND s.solicitante_nome LIKE "%'.$solicitante_nome.'%"';
        }
        
        if ($atendimento_inclusao != '') {
            $params .= " AND CAST(a.atendimento_inclusao as DATE) = '".date('Y-m-d', strtotime($atendimento_inclusao))."'";
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY s.solicitante_nome';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Atendimentos Por Munícipes</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="5"><h3>'.$value['solicitante_nome'].'</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="90px"><strong>Protocolo</strong></td>
                                    <td width="40px"><strong>Status</strong></td>
                                    <td width="250px"><strong>Secretaria</strong></td>
                                    <td width="250px"><strong>Serviço</strong></td>
                                    <td width="60px"><strong>Conclusão</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosAtendimento($value['solicitantes_id'], $params);
                
                $html .= '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getAtendimentoPorSecretarias($filtros)
    {
        $db = new DbExt();
        
        $status_id        = $filtros['status_id'];
        $secretarias_id   = $filtros['secretarias_id'];
        $solicitante_nome = $filtros['solicitante_nome'];
        $atendimento_inclusao = $filtros['atendimento_inclusao'];
        
        $sql = 'SELECT sc.secretaria_nome,'
                . '    a.secretarias_id'
                . ' FROM Gg_atendimentos a '
                . ' JOIN Gg_solicitantes s ON (s.solicitantes_id = a.solicitantes_id)'
                . ' JOIN Gg_secretarias sc ON (sc.secretarias_id = a.secretarias_id)'
                . ' WHERE sc.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($status_id != '') {
            $params .= ' AND a.status_id = '.$status_id;
        }
        
        if ($secretarias_id != '') {
            $params .= ' AND a.secretarias_id = '.$secretarias_id;
        }
        
        if ($solicitante_nome != '') {
            $params .= ' AND s.solicitante_nome LIKE "%'.$solicitante_nome.'%"';
        }
        
        if ($atendimento_inclusao != '') {
            $params .= " AND CAST(a.atendimento_inclusao as DATE) = '".date('Y-m-d', strtotime($atendimento_inclusao))."'";
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY sc.secretaria_nome';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Atendimentos Por Secretarias</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="5"><h3>'.$value['secretaria_nome'].'</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="90px"><strong>Protocolo</strong></td>
                                    <td width="40px"><strong>Status</strong></td>
                                    <td width="250px"><strong>Munícipe</strong></td>
                                    <td width="250px"><strong>Serviço</strong></td>
                                    <td width="60px"><strong>Conclusão</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosAtendimentoSecretaria($value['secretarias_id'], $params);
                
                $html .= '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getAtendimentoPorUsuarios($filtros)
    {
        $db = new DbExt();
        
        $status_id        = $filtros['status_id'];
        $secretarias_id   = $filtros['secretarias_id'];
        $solicitante_nome = $filtros['solicitante_nome'];
        $usuarios_id      = $filtros['usuarios_id'];
        $atendimento_inclusao = $filtros['atendimento_inclusao'];
        
        $sql = 'SELECT u.usuario_nome,'
                . '    a.usuarios_id'
                . ' FROM Gg_atendimentos a '
                . ' JOIN Gg_solicitantes s ON (s.solicitantes_id = a.solicitantes_id)'
                . ' JOIN Gg_secretarias sc ON (sc.secretarias_id = a.secretarias_id)'
                . ' JOIN Gg_usuarios     u ON (u.usuarios_id     = a.usuarios_id   )'
                . ' WHERE sc.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($status_id != '') {
            $params .= ' AND a.status_id = '.$status_id;
        }
        
        if ($secretarias_id != '') {
            $params .= ' AND a.secretarias_id = '.$secretarias_id;
        }
        
        if ($solicitante_nome != '') {
            $params .= ' AND s.solicitante_nome LIKE "%'.$solicitante_nome.'%"';
        }
        
        if ($usuarios_id != '') {
            $params .= ' AND a.usuarios_id = '.$usuarios_id;
        }
        
        if ($atendimento_inclusao != '') {
            $params .= " AND CAST(a.atendimento_inclusao as DATE) = '".date('Y-m-d', strtotime($atendimento_inclusao))."'";
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY u.usuario_nome';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Atendimentos Por Usuários</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="5"><h3>Usuário: '.$value['usuario_nome'].'</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="90px"><strong>Protocolo</strong></td>
                                    <td width="40px"><strong>Status</strong></td>
                                    <td width="250px"><strong>Munícipe</strong></td>
                                    <td width="250px"><strong>Secretaria</strong></td>
                                    <td width="60px"><strong>Conclusão</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosAtendimentoUsuarios($value['usuarios_id'], $params);
                
                $html .= '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getMotoristas($motorista_nome = '')
    {
        $db = new DbExt();
        
        $html = Yii::app()->functions->getCabecalhoRelatorios(); 
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Motoristas</h2>
                 <table style="border-style:solid; padding-bottom:5px;">
                     <tbody>
                     <tr align="center">
                         <td><strong>Nome</strong></td>
                         <td><strong>CPF</strong></td>
                         <td><strong>Categoria</strong></td>
                         <td><strong>Telefone</strong></td>
                     </tr>';
        
        $sql = 'SELECT m.motorista_nome,'
                . '    m.motorista_cpf,'
                . '    m.motorista_categoria,'
                . '    m.motorista_telefone'
                . ' FROM Gg_motoristas m'
                . ' WHERE m.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        if ($motorista_nome != '') {
            $sql .= ' AND motorista_nome LIKE "%'.$motorista_nome.'%"';
        }
        
        $sql .= ' ORDER BY m.motorista_nome ASC';
        
        $i = 0;
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) == 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=   '<td>'.substr($value['motorista_nome'], 0, 65).'</td>
                            <td>'.$value['motorista_cpf'].'</td>
                            <td>'.$value['motorista_categoria'].'</td>
                            <td>'.$value['motorista_telefone'].'</td>    
                        </tr>';
                $i++;
            }
        }
        
        $html .= '</tbody>
                </table>
                    </div>
                </div>  
            </body>
        </html>';
        
        
        return $html;
    }
    
    public function getVeiculos($filtros)
    {
        $db = new DbExt();
        
        $veiculo   = '';//$filtros['veiculos_id'];
        $tipo        = '';//$filtros['veiculo_tipo'];
        $status      = '';//$filtros['status_veiculo_id'];
        $secretaria  = '';//$filtros['secretarias_id'];
        
        $html = Yii::app()->functions->getCabecalhoRelatorios(); 
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Veículos</h2>
                 <table style="border-style:solid; padding-bottom:5px;">
                     <tbody>
                     <tr align="center">
                         <td><strong>Veículo</strong></td>
                         <td><strong>Placa</strong></td>
                         <td><strong>Tipo</strong></td>
                         <td><strong>Quilometragem</strong></td>
                         <td><strong>Secretaria</strong></td>
                         <td><strong>Status</strong></td>
                     </tr>';      
          
        
        $sql = 'SELECT COALESCE( s.secretaria_nome,  \'\' ) AS secretaria,'
                . '    v.veiculo_descricao,'
                . '    v.veiculo_placa,'
                . '    v.veiculo_chassi,'
                . '    t.tipo_nome,'
                . '    COALESCE( v.veiculo_quilometragem,  \'\' ) AS veiculo_quilometragem,' 
                . '    sv.status_nome'    
                . ' FROM Gg_veiculos v'
                . ' LEFT JOIN Gg_secretarias s ON ( v.secretarias_id = s.secretarias_id )'
                . ' JOIN Gg_tipo_veiculos t ON ( v.veiculo_tipo = t.tipos_id )'
                . ' JOIN Gg_status_veiculos sv ON ( v.status_veiculos_id = sv.status_veiculos_id )'
                . ' WHERE v.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($tipo != '') {
            $params .= ' AND v.veiculo_tipo = '.$tipo;
        }
        
        if ($status != '') {
            $params .= ' AND v.status_veiculos_id = '.$status;
        }
        
        if ($secretaria != '') {
            $params .= ' AND v.secretarias_id = '.$secretaria;
        }
        
        $sql .= $params;
        
        $sql .= ' ORDER BY v.veiculo_descricao ASC';
        
        $i = 0;
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) == 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=   '<td>'.substr($value['veiculo_descricao'], 0, 31).'</td>
                            <td>'.$value['veiculo_placa'].'</td>
                            <td>'.$value['tipo_nome'].'</td>
                            <td>'.$value['veiculo_quilometragem'].'</td>
                            <td>'.substr($value['secretaria'], 0, 25).'</td>
                            <td>'.$value['status_nome'].'</td>    
                        </tr>';
                $i++;
            }
        }
        
        $html .= '</tbody>
                </table>
                    </div>
                </div>  
            </body>
        </html>';
        
        
        return $html;
    }
    
    public function getManutencoesPorVeiculos($filtros)
    {
        $db = new DbExt();
        
        $veiculo = '';//$filtros['veiculos_id'];
        $data      = '';//$filtros['manutencao_data'];
        
        $sql = 'SELECT v.veiculos_id,'
                . '    v.veiculo_descricao,'
                . '    v.veiculo_placa,'
                . '    sum(m.manutencao_preco) as total'
                . ' FROM Gg_manutencoes m '
                . ' JOIN Gg_veiculos v ON (v.veiculos_id = m.veiculos_id)'
                . ' WHERE m.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($data != '') {
            $params .= " AND CAST(m.manutencao_data as DATE) = '".date('Y-m-d', strtotime($data))."'";
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY v.veiculo_placa';
        
        $sql .= ' ORDER BY v.veiculo_descricao, v.veiculo_placa';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Manutenções Por Veiculos</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="4"><h3>'.substr($value['veiculo_descricao'], 0, 31).' ('.$value['veiculo_placa'].')</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="500px"><strong>Descrição</strong></td>
                                    <td width="60px"><strong>Preço (R$)</strong></td>
                                    <td width="90px"><strong>Quilometragem</strong></td>
                                    <td width="40px"><strong>Data</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosManutencao($value['veiculos_id'], $params);
                
                $html .=  '<tr>
                                        <td colspan="4"><h3 align="right"><u>Total '.number_format($value['total'], 2, ',', '.').'</u></h3></td>
                           </tr>'                            
                        . '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getConteudoRelatoriosManutencao($veiculos_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT m.manutencao_descricao, 
                        m.manutencao_preco, 
                        m.manutencao_quilometragem, 
                        m.manutencao_data                        
                  FROM Gg_manutencoes m
                  JOIN Gg_veiculos v ON (m.veiculos_id = v.veiculos_id )
                  WHERE 1 = 1
                    AND v.veiculos_id = ".$veiculos_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY m.manutencao_data";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td>'.substr($value['manutencao_descricao'], 0, 71).'</td>
                           <td>'.number_format($value['manutencao_preco'], 2, ',', '.').'</td>
                           <td>'.$value['manutencao_quilometragem'].'</td>    
                           <td>'.date('d/m/Y', strtotime($value['manutencao_data'])).'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getAbastecimentosPorVeiculos($filtros)
    {
        $db = new DbExt();
        
        $veiculo   = '';//$filtros['veiculos_id'];
        $data        = '';//$filtros['abastecimento_data'];
        $combustivel = '';//$filtros['combustivel_id'];
        
        $sql = 'SELECT v.veiculos_id,'
                . '    v.veiculo_descricao,'
                . '    v.veiculo_placa,'
                . '    sum(a.abastecimento_preco) as total'
                . ' FROM Gg_abastecimentos a '
                . ' JOIN Gg_veiculos v ON (v.veiculos_id = a.veiculos_id)'
                . ' WHERE a.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($data != '') {
            $params .= " AND CAST(a.abastecimento_data as DATE) = '".date('Y-m-d', strtotime($data))."'";
        }
        
        if ($combustivel != '') {
            $params .= ' AND a.combustivel_id = '.$combustivel;
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY v.veiculo_placa';
        
        $sql .= ' ORDER BY v.veiculo_descricao, v.veiculo_placa';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Abastecimentos Por Veiculos</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="5"><h3>'.substr($value['veiculo_descricao'], 0, 31).' ('.$value['veiculo_placa'].')</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="200px"><strong>Combustível</strong></td>
                                    <td width="60px"><strong>Litros</strong></td>
                                    <td width="60px"><strong>Preço (R$)</strong></td>
                                    <td width="90px"><strong>Quilometragem</strong></td>
                                    <td width="40px"><strong>Data</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosAbastecimento($value['veiculos_id'], $params);
                
                $html .=  '<tr>
                                        <td colspan="5"><h3 align="right"><u>Total '.number_format($value['total'], 2, ',', '.').'</u></h3></td>
                           </tr>'                            
                        . '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getConteudoRelatoriosAbastecimento($veiculos_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT c.combustivel_nome,
                        a.abastecimento_litro,
                        a.abastecimento_preco, 
                        a.abastecimento_quilometragem, 
                        a.abastecimento_data                        
                  FROM Gg_abastecimentos a
                  JOIN Gg_veiculos v ON (a.veiculos_id = v.veiculos_id )
                  JOIN Gg_tipo_combustivel c ON (a.combustivel_id = c.combustivel_id )
                  WHERE 1 = 1
                    AND v.veiculos_id = ".$veiculos_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY a.abastecimento_data";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td>'.$value['combustivel_nome'].'</td>
                           <td>'.$value['abastecimento_litro'].'</td> 
                           <td>'.number_format($value['abastecimento_preco'], 2, ',', '.').'</td>
                           <td>'.$value['abastecimento_quilometragem'].'</td>    
                           <td>'.date('d/m/Y', strtotime($value['abastecimento_data'])).'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getViagensPorVeiculos($filtros)
    {
        $db = new DbExt();
        
        $veiculo      = '';//$filtros['veiculos_id'];
        $motorista    = '';//$filtros['motorista_nome'];
        $data_saida   = '';//$filtros['data_saida'];
        $data_chegada = '';//$filtros['data_chegada'];
        $avaria       = '';//$filtros['avaria'];
        
        $sql = 'SELECT v.veiculos_id,'
                . '    v.veiculo_descricao,'
                . '    v.veiculo_placa'
                . ' FROM Gg_veiculo_viagens vv '
                . ' JOIN Gg_veiculos v ON (v.veiculos_id = vv.veiculos_id)'
                . ' JOIN Gg_motoristas m ON (m.motoristas_id = vv.motoristas_id)'
                . ' WHERE vv.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($motorista != '') {
            $params .= ' AND m.motorista_nome LIKE "%'.$motorista.'%"';
        }
        
        if ($data_saida != '') {
            $params .= " AND CAST(vv.data_saida as DATE) = '".date('Y-m-d', strtotime($data_saida))."'";
        }
        
        if ($data_chegada != '') {
            $params .= " AND CAST(vv.data_chegada as DATE) = '".date('Y-m-d', strtotime($data_chegada))."'";
        }
        
        if ($avaria != '') {
            $params .= ' AND vv.avaria = '.$avaria;
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY v.veiculo_placa';
        
        $sql .= ' ORDER BY v.veiculo_descricao, v.veiculo_placa';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Viagens Por Veiculos</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="7"><h3>'.substr($value['veiculo_descricao'], 0, 31).' ('.$value['veiculo_placa'].')</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="200px"><strong>Motorista</strong></td>
                                    <td width="40px"><strong>Data Saída</strong></td>
                                    <td width="90px"><strong>KM Saída</strong></td>
                                    <td width="250px"><strong>Destino</strong></td>
                                    <td width="40px"><strong>Data Saída</strong></td>
                                    <td width="90px"><strong>KM Saída</strong></td>
                                    <td width="40px"><strong>Avarias?</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosViagens($value['veiculos_id'], $params);
                
                $html .=  '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getConteudoRelatoriosViagens($veiculos_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT m.motorista_nome, 
                        vv.data_saida, 
                        vv.quilometragem_saida,
                        vv.hora_saida,
                        vv.destino,
                        vv.finalidade,
                        vv.data_chegada, 
                        vv.quilometragem_chegada,
                        vv.hora_chegada,
                        IF(avaria=1,'SIM','NÃO') as avaria                        
                  FROM Gg_veiculo_viagens vv
                  JOIN Gg_veiculos v ON (vv.veiculos_id = v.veiculos_id )
                  JOIN Gg_motoristas m ON (m.motoristas_id = vv.motoristas_id)
                  WHERE 1 = 1
                    AND v.veiculos_id = ".$veiculos_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY vv.data_chegada";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td width="200px>'.substr($value['motorista_nome'], 0, 25).'</td> 
                           <td width="40px>'.date('d/m/Y', strtotime($value['data_saida'])).'</td>
                           <td width="90px>'.$value['quilometragem_saida'].'</td>    
                           <td width="250px>'.substr($value['destino'], 0, 31).'</td>    
                           <td width="40px>'.date('d/m/Y', strtotime($value['data_chegada'])).'</td>
                           <td width="90px>'.$value['quilometragem_chegada'].'</td>  
                           <td width="40px>'.$value['avaria'].'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getViagensPorMotoristas($filtros)
    {
        $db = new DbExt();
        
        $veiculo      = '';//$filtros['veiculos_id'];
        $motorista    = '';//$filtros['motorista_nome'];
        $data_saida   = '';//$filtros['data_saida'];
        $data_chegada = '';//$filtros['data_chegada'];
        $avaria      = '';//$filtros['avaria'];
        
        $sql = 'SELECT m.motoristas_id,'
                . '    m.motorista_nome'
                . ' FROM Gg_veiculo_viagens vv '
                . ' JOIN Gg_veiculos v ON (v.veiculos_id = vv.veiculos_id)'
                . ' JOIN Gg_motoristas m ON (m.motoristas_id = vv.motoristas_id)'
                . ' WHERE vv.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($motorista != '') {
            $params .= ' AND m.motorista_nome LIKE "%'.$motorista.'%"';
        }
        
        if ($data_saida != '') {
            $params .= " AND CAST(vv.data_saida as DATE) = '".date('Y-m-d', strtotime($data_saida))."'";
        }
        
        if ($data_chegada != '') {
            $params .= " AND CAST(vv.data_chegada as DATE) = '".date('Y-m-d', strtotime($data_chegada))."'";
        }
        
        if ($avaria != '') {
            $params .= ' AND vv.avaria = '.$avaria;
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY m.motoristas_id';
        
        $sql .= ' ORDER BY m.motorista_nome, m.motoristas_id';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Viagens Por Motoristas</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="7"><h3>'.substr($value['motorista_nome'], 0, 61).'</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="200px"><strong>Veículo</strong></td>
                                    <td width="40px"><strong>Data Saída</strong></td>
                                    <td width="90px"><strong>KM Saída</strong></td>
                                    <td width="250px"><strong>Destino</strong></td>
                                    <td width="40px"><strong>Data Saída</strong></td>
                                    <td width="90px"><strong>KM Saída</strong></td>
                                    <td width="40px"><strong>Avarias?</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosViagensMotoristas($value['motoristas_id'], $params);
                
                $html .=  '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getConteudoRelatoriosViagensMotoristas($motoristas_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT v.veiculo_descricao,
                        v.veiculo_placa,
                        vv.data_saida, 
                        vv.quilometragem_saida,
                        vv.hora_saida,
                        vv.destino,
                        vv.finalidade,
                        vv.data_chegada, 
                        vv.quilometragem_chegada,
                        vv.hora_chegada,
                        IF(avaria=1,'SIM','NÃO') as avaria                        
                  FROM Gg_veiculo_viagens vv
                  JOIN Gg_veiculos v ON (vv.veiculos_id = v.veiculos_id )
                  JOIN Gg_motoristas m ON (m.motoristas_id = vv.motoristas_id)
                  WHERE 1 = 1
                    AND m.motoristas_id = ".$motoristas_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY vv.data_chegada";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) != 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td width="200px>'.substr($value['veiculo_descricao'], 0, 12).' ('.$value['veiculo_placa'].')</td> 
                           <td width="40px>'.date('d/m/Y', strtotime($value['data_saida'])).'</td>
                           <td width="90px>'.$value['quilometragem_saida'].'</td>    
                           <td width="250px>'.substr($value['destino'], 0, 31).'</td>    
                           <td width="40px>'.date('d/m/Y', strtotime($value['data_chegada'])).'</td>
                           <td width="90px>'.$value['quilometragem_chegada'].'</td>  
                           <td width="40px>'.$value['avaria'].'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
    
    public function getVeiculosSintetico($filtros)
    {
        $db = new DbExt();
        
        $veiculo   = '';//$filtros['veiculos_id'];
        $tipo        = '';//$filtros['veiculo_tipo'];
        $status      = '';//$filtros['status_veiculo_id'];
        $secretaria  = '';//$filtros['secretarias_id'];
        
        $html = Yii::app()->functions->getCabecalhoRelatorios(); 
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Relatório de Veículos - Sintético</h2>
                 <table style="border-style:solid; padding-bottom:5px;">
                     <tbody>
                     <tr align="center">
                         <td><strong>Veículo</strong></td>
                         <td><strong>Tipo</strong></td>
                         <td><strong>Viagens</strong></td>
                         <td><strong>Manutenções(R$)</strong></td>
                         <td><strong>Abastecimentos(R$)</strong></td>
                         <td><strong>Status</strong></td>
                     </tr>';      
          
        
        $sql = 'SELECT COALESCE( s.secretaria_nome,  \'\' ) AS secretaria,'
                . '    v.veiculo_descricao,'
                . '    v.veiculo_placa,'
                . '    v.veiculo_chassi,'
                . '    t.tipo_nome,'
                . '    COALESCE( v.veiculo_quilometragem,  \'\' ) AS veiculo_quilometragem,' 
                . '    COUNT(DISTINCT vv.viagens_id) AS viagens,'
                . '    SUM(m.manutencao_preco) AS manutencoes,'
                . '    SUM(a.abastecimento_preco) AS abastecimentos,'
                . '    sv.status_nome'    
                . ' FROM Gg_veiculos v'
                . ' LEFT JOIN Gg_secretarias s ON ( v.secretarias_id = s.secretarias_id )'
                . ' JOIN Gg_tipo_veiculos t ON ( v.veiculo_tipo = t.tipos_id )'
                . ' JOIN Gg_status_veiculos sv ON ( v.status_veiculos_id = sv.status_veiculos_id )'
                . ' LEFT JOIN Gg_veiculo_viagens vv ON ( v.veiculos_id = vv.veiculos_id )'
                . ' LEFT JOIN Gg_manutencoes m ON ( v.veiculos_id = m.veiculos_id )'
                . ' LEFT JOIN Gg_abastecimentos a ON ( v.veiculos_id = a.veiculos_id )'
                . ' WHERE v.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($tipo != '') {
            $params .= ' AND v.veiculo_tipo = '.$tipo;
        }
        
        if ($status != '') {
            $params .= ' AND v.status_veiculos_id = '.$status;
        }
        
        if ($secretaria != '') {
            $params .= ' AND v.secretarias_id = '.$secretaria;
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY v.veiculos_id ORDER BY v.veiculo_descricao ASC';
        
        $i = 0;
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if (($i % 2) == 0) {
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=   '<td>'.substr($value['veiculo_descricao'], 0, 12).' ('.$value['veiculo_placa'].')</td>
                            <td>'.$value['tipo_nome'].'</td>
                            <td>'.$value['viagens'].'</td>
                            <td>'.number_format($value['manutencoes'], 2, ',', '.').'</td>
                            <td>'.number_format($value['abastecimentos'], 2, ',', '.').'</td>    
                            <td>'.$value['status_nome'].'</td>    
                        </tr>';
                $i++;
            }
        }
        
        $html .= '</tbody>
                </table>
                    </div>
                </div>  
            </body>
        </html>';
        
        
        return $html;
    }
    
    public function getAgenda($filtros)
    {
        $db = new DbExt();
        
        $veiculo = '';//$filtros['veiculos_id'];
        $data      = '';//$filtros['manut_agenda_data'];
        $quilometragem = '';//$filtros['manut_agenda_quilometragem'];
        $alertando = '';//$filtros['alertando'];
        
        $sql = 'SELECT v.veiculos_id,'
                . '    v.veiculo_descricao,'
                . '    v.veiculo_placa'
                . ' FROM Gg_manut_agenda m '
                . ' JOIN Gg_veiculos v ON (v.veiculos_id = m.veiculos_id)'
                . ' WHERE m.prefeituras_id = '.Yii::app()->session['active_prefeituras_id'];
        
        $params = '';
       
        if ($veiculo != '') {
            $params .= ' AND v.veiculos_id = '.$veiculo;
        }
        
        if ($data != '') {
            $params .= " AND CAST(m.manut_agenda_data as DATE) = '".date('Y-m-d', strtotime($data))."'";
        }
        
        if ($quilometragem != '') {
            $params .= ' AND m.manut_agenda_quilometragem = '.$quilometragem;
        }
        
        if ($alertando != '') {
            $params .= ' AND m.alertando = '.$alertando;
        }
        
        $sql .= $params;
        
        $sql .= ' GROUP BY v.veiculo_placa';
        
        $sql .= ' ORDER BY v.veiculo_descricao, v.veiculo_placa';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr><h2 align="center">Agenda de Manutenções Por Veiculos</h2>';
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<table>
                            <thead>
                                <tr>
                                        <td colspan="4"><h3>'.substr($value['veiculo_descricao'], 0, 31).' ('.$value['veiculo_placa'].')</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="500px"><strong>Descrição</strong></td>
                                    
                                    <td width="90px"><strong>Quilometragem</strong></td>
                                    <td width="40px"><strong>Data</strong></td>
                                    <td width="60px"><strong>Alerta</strong></td>
                                </tr>';
                
                $html .= $this->getConteudoRelatoriosAgenda($value['veiculos_id'], $params);
                
                $html .=  '</tbody></table>';
            }
        } 
         
        $html .= '</div>
                </div>  
            </body>
        </html>';
        
        return $html;
    }
    
    public function getConteudoRelatoriosAgenda($veiculos_id = '', $params = '')
    {
        $db = new DbExt();
        
        $sql =  "SELECT m.manut_agenda_descricao, 
                        m.manut_agenda_data, 
                        m.manut_agenda_quilometragem, 
                        m.alertando                        
                  FROM Gg_manut_agenda m
                  JOIN Gg_veiculos v ON (m.veiculos_id = v.veiculos_id )
                  WHERE 1 = 1
                    AND v.veiculos_id = ".$veiculos_id;
        
        $sql .= $params;
        
        $sql .= " ORDER BY m.manut_agendas_id";
        
        $html = '';
        
        $i = 0;
       
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                if($value['manut_agenda_data'] == '0000-00-00'){
                    $data_agenda = '';
                }else{
                    $data_agenda = date('d/m/Y', strtotime($value['manut_agenda_data']));
                } 
                if (($i % 2) != 0) {                    
                $html .= '<tr>';
                } else {
                    $html .= '<tr style="background-color: #CCC;">';
                }
                $html .=  '<td>'.substr($value['manut_agenda_descricao'], 0, 71).'</td>
                           <td>'.$value['manut_agenda_quilometragem'].'</td>    
                           <td>'.$data_agenda.'</td>
                           <td>'.$value['alertando'].'</td>'
                        . '</tr>';
                
                $i++;
            }
        }
        
        return $html;
    }
}

