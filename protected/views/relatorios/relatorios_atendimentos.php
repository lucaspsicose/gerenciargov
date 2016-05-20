<?php
$this->menu=array(
	array('label'=>'Módulo de Cadastros', 'url'=>array('main')),
        array('label'=>'Módulo de Atendimentos', 'url'=>array('atendimentos')),
        array('label'=>'Módulo de Controle de Frota', 'url'=>array('viagens')),
);
?>


<div class="container">
    <div class="col-md-12 career-head">
    <h1>Relatórios</h1>
    </div>    
      <section class="tab wow fadeInLeft">
        <header class="panel-heading tab-bg-dark-navy-blue">
          <ul class="nav nav-tabs nav-justified ">
            <li class="active">
              <a data-toggle="tab" href="#relatorios">
                Atendimentos por Munícipes
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#porSecretarias">
                Atendimentos por Secretarias
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#porUsuarios">
                Atendimentos por Usuários
              </a>
            </li>
          </ul>
        </header>
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div id="relatorios" class="tab-pane fade in active">
                <h3>Atendimentos Por Munícipes</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/atendimentosporsolicitantes'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Secretaria', 'Filtros[secretarias_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[secretarias_id]', '', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
                </div>  
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Status', 'Filtros[status_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[status_id]', '', CHtml::listData(Gg_status::model()->findAll(array('order'=>'status_id')), 'status_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
                </div> 
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Nome do Munícipe', 'Filtros[solicitante_nome]'); ?>
                    <?php echo CHtml::textField('Filtros[solicitante_nome]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Data do Atendimento', 'Filtros[atendimento_inclusao]'); ?>
                    <?php echo CHtml::dateField('Filtros[atendimento_inclusao]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div id="porSecretarias" class="tab-pane fade">
                <h3>Atendimentos Por Secretarias</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/atendimentosporsecretarias'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Secretaria', 'Filtros[secretarias_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[secretarias_id]', '', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
                </div>  
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Status', 'Filtros[status_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[status_id]', '', CHtml::listData(Gg_status::model()->findAll(array('order'=>'status_id')), 'status_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
                </div> 
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Nome do Munícipe', 'Filtros[solicitante_nome]'); ?>
                    <?php echo CHtml::textField('Filtros[solicitante_nome]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Data do Atendimento', 'Filtros[atendimento_inclusao]'); ?>
                    <?php echo CHtml::dateField('Filtros[atendimento_inclusao]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div id="porUsuarios" class="tab-pane fade">
                <h3>Atendimentos Por Usuários</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/atendimentosporusuario'), 'get', array('target'=>'_blank')); ?>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Usuário', 'Filtros[usuarios_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[usuarios_id]', '', CHtml::listData(Gg_usuarios::model()->findAll(array('order'=>'usuario_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'usuarios_id', 'usuario_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
                </div> 
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Secretaria', 'Filtros[secretarias_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[secretarias_id]', '', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
                </div>  
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Status', 'Filtros[status_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[status_id]', '', CHtml::listData(Gg_status::model()->findAll(array('order'=>'status_id')), 'status_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Data do Atendimento', 'Filtros[atendimento_inclusao]'); ?>
                    <?php echo CHtml::dateField('Filtros[atendimento_inclusao]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group field-control">
                    <?php echo CHtml::label('Nome do Munícipe', 'Filtros[solicitante_nome]'); ?>
                    <?php echo CHtml::textField('Filtros[solicitante_nome]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
          </div>
        </div>
      </section>

    
</div>

