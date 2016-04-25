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
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<tr>
                            <td>'.$value['solicitante_nome'].'</td>
                            <td>'.$value['solicitante_telefone'].'</td>
                            <td>'.$value['solicitante_celular'].'</td>
                            <td>'.$value['solicitante_email'].'</td>
                            <td>'.$value['solicitante_data_nascimento'].'</td>
                        </tr>';
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
        
        if ($res = $db->rst($sql)) {
            foreach ($res as $value) {
                $html .= '<tr>
                            <td>'.$value['solicitante_nome'].'</td>
                            <td>'.$value['solicitante_endereco'].' nº '.$value['solicitante_numero'].' '.$value['solicitante_bairro'].'</td>
                            <td>'.$value['telefone'].'</td>
                        </tr>';
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
    
}

