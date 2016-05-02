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


    public function actionAniversariantes() 
    {   
        if (isset($_GET['mes'])) {
                //require('/../vendors/html2pdf/html2pdf.class.php');
                $mes_aniversario = $_GET['mes'];
                //$html2pdf = new HTML2PDF('P', 'A4', 'pt');//Yii::app()->ePdf->HTML2PDF();
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
                           <td>'.$value['descricao_servico'].'</td>
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
        
        $sql .= $params;
        
        $sql .= ' GROUP BY s.solicitante_nome';
        
        $html = Yii::app()->functions->getCabecalhoRelatorios();
        
        $html .= '<div style="float: left; width:100%">
                 <hr>';
        
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
    
}

