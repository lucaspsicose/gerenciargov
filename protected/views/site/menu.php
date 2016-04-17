<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="white-bg">
    <div class="container career-inner">
        <div class="row">         
            
            <div class="box">
                <div class="box-body">
                    <a href="<?php echo $this->createUrl('gg_atendimentos/admin') ?>" class="btn btn-app">
                        <span class="badge bg-yellow"><?php echo SiteController::getQuantidadeAtendimentos(Yii::app()->session['active_secretarias_id']) ?></span>
                        <i class="fa fa-bullhorn"></i> Atendimentos
                    </a>
                    <a href="<?php echo $this->createUrl('gg_usuarios/admin') ?>" class="btn btn-app">
                        <span class="badge bg-purple"><?php echo SiteController::getQuantidadeUsuarios(Yii::app()->session['active_prefeituras_id']) ?></span>
                        <i class="fa fa-users"></i> Usuários
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-edit"></i> Cadastros
                    </a>                    
                    <a class="btn btn-app">
                        <i class="fa fa-inbox"></i> Relatórios
                    </a>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
