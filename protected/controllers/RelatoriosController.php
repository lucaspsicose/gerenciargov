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
        $this->render('aniversariantes');
    }
        
    public function actionAniversariantes() 
    {   
        if (isset($_GET['mes'])) {
                require('/../vendors/html2pdf/html2pdf.class.php');
                $mes_aniversario = $_GET['mes'];
                $html2pdf = new HTML2PDF('P', 'A4', 'pt');//Yii::app()->ePdf->HTML2PDF();
                $txt      = $this->getAniversariantesMes($mes_aniversario);
                $html2pdf->WriteHTML($txt);                
                $html2pdf->Output();
            }
        
    }
    
    public function getAniversariantesMes($mes_aniversario = '')
    {
        $db = new DbExt();
        
        $sql_cabecalho = 'SELECT   p.prefeitura_nome,'
                            . '    p.prefeitura_endereco,'
                            . '    p.prefeitura_numero,'
                            . '    p.prefeitura_telefone,'
                            . '    p.prefeitura_municipio,'
                            . '    e.estado_nome'
                            . ' FROM Gg_prefeituras p'
                            . ' JOIN Gg_estados e ON (e.estados_id = p.estados_id)'
                            . ' WHERE p.prefeituras_id = '.  Yii::app()->session['active_prefeituras_id'];
        
        if ($res = $db->rst($sql_cabecalho)) {
            foreach ($res as $value) {
                $prefeitura    = $value['prefeitura_nome'];
                $pref_endereco = $value['prefeitura_endereco'];
                $pref_numero   = $value['prefeitura_numero'];
                $pref_tel      = $value['prefeitura_telefone'];
                $cidade        = $value['prefeitura_municipio'];
                $estado        = $value['estado_nome'];
            }
        }
        
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
        
        $html = '<html>
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>relatório de Atendimento</title>
                        <style>
                                table {
                                        font-size: 16px;
                                        line-height: 30px;
                                }
                        </style>
                        </head>

                        <body>
                        <div style="width: 100%;">
                            <div style="float: left">
                                <img src="'.Yii::app()->request->getBaseUrl(true).'/assets/img/D-large1.png" alt="" width="258" height="95" />
                        </div>    
                            <div style="float: none; padding-top: 5px; text-align:center; line-height: 1px">
                                <h2 align="center">'.$prefeitura.'</h2>
                                <p>'.$pref_endereco.' nº '.$pref_numero.'</p>
                                <p>Telefone - '.$pref_tel.'</p>
                                <p>'.$cidade.' - '.$estado.'</p>
                            </div>
                        <div style="float: left; width:100%">
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
    
}

