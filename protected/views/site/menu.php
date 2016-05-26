<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!Yii::app()->session['active_secretarias_id']) {
    SiteController::redirect(Yii::app()->request->baseUrl.'/site');
}

Yii::app()->clientScript->registerScript('search', "
$('#cadastros').click(function(){
    if (document.getElementById('div-cadastros').style.display === 'none') {
        $('#div-cadastros').show('slow');
        var deslocamento = $('#div-cadastros').offset().top;
        $('html, body').animate({ scrollTop: deslocamento }, 'slow');
    } else {
        $('#div-cadastros').hide('slow');
    }
	return false;
});

$('#viagens').click(function(){
    if (document.getElementById('div-viagens').style.display === 'none') {
        $('#div-viagens').show('slow');
        var deslocamento = $('#div-viagens').offset().top;
        $('html, body').animate({ scrollTop: deslocamento }, 'slow');
    } else {
        $('#div-viagens').hide('slow');
    }
	return false;
});
");

?>
<div class="white-bg">
    <div class="container career-inner">
        <div class="row">         
            <div class="col-md-12 career-head">
                <h1 class="wow fadeIn">Menu Principal</h1>
            </div>
            <hr>
            <div class="box wow fadeIn">
                <div class="box-body">
                    <a href="<?php echo $this->createUrl('gg_atendimentos/admin') ?>" class="btn btn-app">
                        <span class="badge bg-yellow"><?php echo SiteController::getQuantidadeAtendimentos(Yii::app()->session['active_secretarias_id']) ?></span>
                        <i class="fa fa-bullhorn"></i> Atendimentos
                    </a>
                    <a href="#" id="cadastros" class="btn btn-app">
                        <i class="fa fa-edit"></i> Cadastros
                    </a> 
                    <?php if (Yii::app()->session['perfil'] == '1') : ?>
                        <a href="<?php echo $this->createUrl('relatorios/index') ?>" class="btn btn-app">
                            <i class="fa fa-inbox"></i> Relatórios
                        </a>
                    <?php endif; ?>
                    <a href="#" id="viagens" class="btn btn-app">
                        <i class="fa fa-truck"></i> Controle de Frota
                    </a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        
        <div class="row" id="div-cadastros" style="display: none">         
            <div class="col-md-12 career-head">
                <h1 class="wow fadeIn">Cadastros</h1>
            </div>
            <hr>
            <div class="box wow fadeIn">
                <div class="box-body">
                    <a href="<?php echo $this->createUrl('gg_solicitantes/admin') ?>" class="btn btn-app">
                        <i class="fa fa-bullhorn"></i> Munícipes
                    </a> 
                    <?php // Condição para mostrar os menus de cadastro abaixo somente para usuários com perfil de administrador ?>
                    <?php if (Yii::app()->session['perfil'] == '1') : ?>
                        <a href="<?php echo $this->createUrl('gg_usuarios/admin') ?>" class="btn btn-app">
                            <span class="badge bg-purple"><?php echo SiteController::getQuantidadeUsuarios(Yii::app()->session['active_prefeituras_id']) ?></span>
                            <i class="fa fa-users"></i> Usuários
                        </a>
                        <a href="<?php echo $this->createUrl('gg_secretarias/admin') ?>" class="btn btn-app">
                            <i class="fa fa-file"></i> Secretarias
                        </a>
                        <a href="<?php echo $this->createUrl('gg_veiculos/admin') ?>" class="btn btn-app">
                            <i class="fa fa-ambulance"></i> Veículos
                        </a>
                        <a href="<?php echo $this->createUrl('gg_motoristas/admin') ?>" class="btn btn-app">
                            <i class="fa fa-male"></i> Motoristas
                        </a>
                        <a href="<?php echo $this->createUrl('gg_responsaveis/admin') ?>" class="btn btn-app">
                            <i class="fa fa-briefcase"></i> Responsáveis
                        </a>
                    <?php endif; //fim dos menus administrativos ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        
        <div class="row" id="div-viagens" style="display: none">         
            <div class="col-md-12 career-head">
                <h1 class="wow fadeIn">Viagens</h1>
            </div>
            <hr>
            <div class="box wow fadeIn">
                <div class="box-body">
                    <a href="<?php echo $this->createUrl('gg_veiculo_viagens/admin') ?>" class="btn btn-app">
                        <i class="fa fa-globe"></i> Viagens
                    </a>
                    <a href="<?php echo $this->createUrl('gg_abastecimentos/admin') ?>" class="btn btn-app">
                        <i class="fa fa-tachometer"></i> Abastecimentos
                    </a>
                    <a href="<?php echo $this->createUrl('gg_manutencoes/admin') ?>" class="btn btn-app">
                        <i class="fa fa-wrench"></i> Manutenções
                    </a>
                    <a href="<?php echo $this->createUrl('gg_manut_agenda/admin') ?>" class="btn btn-app">
                        <span class="badge bg-red"><?php echo SiteController::getQuantidadeAgenda(Yii::app()->session['active_prefeituras_id']) ?></span>
                        <i class="fa fa-calendar"></i> Agenda de Manutenções
                    </a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
