<?php
    $veiculos = Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao'));
    $this->layout = '//layouts/column1';
    
    Yii::app()->clientScript->registerScript('tooltip', "$(document).ready(function(){
        $('[data-toggle='tooltip']').tooltip();   
        });");
?>

<div class="white-bg">
    <div class="container career-inner">
        <div class="row">
            <div class="col-md-12 career-head">
                <h1 class="wow fadeIn">Viagens - Selecionar Veículo</h1>                
            </div>
            <hr>
            <div class="box wow fadeIn">
                <div class="">
                    <?php foreach ($veiculos as $veiculo) {
                        switch ($veiculo['veiculo_tipo']) {
                            case 1: 
                                $tipo = 'fa-car';
                                break;
                            case 2:
                                $tipo = 'fa-taxi';
                                break;
                            case 3:
                                $tipo = 'fa-car';
                                break;
                            case 4:
                                $tipo = 'fa-bus';
                                break;
                            case 5:
                                $tipo = 'fa-bus';
                                break;
                            case 6:
                                $tipo = 'fa-ambulance';
                                break;
                            case 7:
                                $tipo = 'fa-truck';
                                break;
                            case 8:
                                $tipo = 'fa-train';
                                break;
                            case 9:
                                $tipo = 'fa-bicycle';
                                break;
                        } 
                        
                        switch ($veiculo['status_veiculos_id']) {
                            case 1:
                                $cor = '#DFF0D8';
                                $status = 'Disponível';
                                break;
                            case 2:
                                $cor = '#F2DEDE';
                                $status = 'Em Uso';
                                break;
                            case 3:
                                $cor = '#FCF8E3';
                                $status = 'Manutenção';
                                break;
                        }
                        
                        if ($veiculo['status_veiculos_id'] == 1) {
                            echo '<a href="'.$this->createUrl('gg_veiculo_viagens/create', array('veiculo'=>$veiculo['veiculos_id'])).'" data-toggle="tooltip" title="'.$status.'" id="'.$veiculo['veiculos_id'].'" class="btn btn-veiculo" style="background-color: '.$cor.'">
                                     <i class="fa '.$tipo.'" aria-hidden="true"></i>'.wordwrap($veiculo['veiculo_descricao'], 15, "<br />\n").'<br />
                                     '.$veiculo['veiculo_placa'].'    
                                 </a>';
                        } else {
                            echo '<a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" title="Veículo Indisponível" data-content="Este veículo está indisponível no momento!" id="'.$veiculo['veiculos_id'].'" class="btn btn-veiculo" style="background-color: '.$cor.'">
                                     <i class="fa '.$tipo.'" aria-hidden="true"></i>'.wordwrap($veiculo['veiculo_descricao'], 15, "<br />\n").'<br />
                                     '.$veiculo['veiculo_placa'].'    
                                 </a>';
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>


