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
            <li>
              <a data-toggle="tab" href="#motoristas">
                Motoristas
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#veiculos">
                Veículos
              </a>
            </li>
          </ul>
        </header>
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div id="motoristas" class="tab-pane fade">
                <h3>Motoristas</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/motoristas'), 'get', array('target'=>'_blank')); //Aqui o inicio do form e o Action ?>
                <!-- Aqui começam os filtros  -->
    
                <div class="form-group field-control">
                    <?php echo CHtml::label('Nome do Motorista', 'nome'); ?>
                    <?php echo CHtml::textField('nome', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); //Fim dos filtros e  botão de submit ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div id="veiculos" class="tab-pane fade">
                <h3>Veículos</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/veiculos'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Tipo', 'Filtros[veiculo_tipo]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculo_tipo]', '', CHtml::listData(Gg_tipo_veiculos::model()->findAll(array('order'=>'tipo_nome')), 'tipos_id', 'tipo_nome'), array('class'=>'form-control', 'empty'=>'')); ?> 
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Status', 'Filtros[status_veiculo_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[status_veiculo_id]', '', CHtml::listData(Gg_status_veiculos::model()->findAll(array('order'=>'status_veiculos_id')), 'status_veiculos_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Secretaria', 'Filtros[secretarias_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[secretarias_id]', '', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
          </div>
        </div>
      </section>
      
      <section class="tab wow fadeInLeft">
        <header class="panel-heading tab-bg-dark-navy-blue">
          <ul class="nav nav-tabs nav-justified ">
            <li>
              <a data-toggle="tab" href="#manutencoes">
                Manutenções por Veículos
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#agenda">
                Agenda de Manutenções
              </a>
            </li>
          </ul>
        </header>
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div id="manutencoes" class="tab-pane fade">
                <h3>Manutenções por Veículos</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/manutencoesporveiculos'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Data da Manutenção', 'Filtros[manutencao_data]'); ?>
                    <?php echo CHtml::dateField('Filtros[manutencao_data]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>  
            <div id="agenda" class="tab-pane fade">
                <h3>Agenda de Manutenções</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/agenda'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group field-control">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Data de Agendamento', 'Filtros[manut_agenda_data]'); ?>
                    <?php echo CHtml::dateField('Filtros[manut_agenda_data]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Quilometragem', 'Filtros[manut_agenda_quilometragem]'); ?>
                    <?php echo CHtml::textField('Filtros[manut_agenda_quilometragem]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Alerta', 'Filtros[alertando]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[alertando]', '', array('NÃO' => 'NÃO', 'SIM' => 'SIM', 'VISTO' => 'VISTO'),array('class'=>'form-control', 'empty' => ''));?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>            
          </div>
        </div>
      </section> 
    
     <section class="tab wow fadeInLeft">
        <header class="panel-heading tab-bg-dark-navy-blue">
          <ul class="nav nav-tabs nav-justified ">
            <li>
              <a data-toggle="tab" href="#viagensporveiculos">
                Viagens por Veículos
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#viagenspormotoristas">
                Viagens por Motoristas
              </a>
            </li>
          </ul>
        </header>
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div id="viagensporveiculos" class="tab-pane fade">
                <h3>Viagens por Veículos</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/viagensporveiculos'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Nome do Motorista', 'Filtros[motorista_nome]'); ?>
                    <?php echo CHtml::textField('Filtros[motorista_nome]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Data de Saída', 'Filtros[data_saida]'); ?>
                    <?php echo CHtml::dateField('Filtros[data_saida]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Data de Chegada', 'Filtros[data_chegada]'); ?>
                    <?php echo CHtml::dateField('Filtros[data_chegada]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Avarias', 'Filtros[avaria]'); ?>
                    <?php echo CHtml::checkBox('Filtros[avaria]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>  
            <div id="viagenspormotoristas" class="tab-pane fade">
                <h3>Viagens por Motoristas</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/viagenspormotoristas'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Nome do Motorista', 'Filtros[motorista_nome]'); ?>
                    <?php echo CHtml::textField('Filtros[motorista_nome]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Data de Saída', 'Filtros[data_saida]'); ?>
                    <?php echo CHtml::dateField('Filtros[data_saida]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Data de Chegada', 'Filtros[data_chegada]'); ?>
                    <?php echo CHtml::dateField('Filtros[data_chegada]', '', array('class'=>'form-control')); ?>
                </div>
                
                <div class="form-group col-md-4">
                    <?php echo CHtml::label('Avarias', 'Filtros[avaria]'); ?>
                    <?php echo CHtml::checkBox('Filtros[avaria]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>            
          </div>
        </div>
      </section>

      <section class="tab wow fadeInLeft">
        <header class="panel-heading tab-bg-dark-navy-blue">
          <ul class="nav nav-tabs nav-justified ">
            <li>
              <a data-toggle="tab" href="#abastecimentos">
                Abastecimentos por Veículos
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#sintetico">
                Veículos Sintético
              </a>
            </li>
          </ul>
        </header>
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div id="abastecimentos" class="tab-pane fade">
                <h3>Abastecimentos por Veículos</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/abastecimentosporveiculos'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group field-control">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Combustível', 'Filtros[combustivel_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[combustivel_id]', '', CHtml::listData(Gg_tipo_combustivel::model()->findAll(array('order'=>'combustivel_nome')), 'combustivel_id', 'combustivel_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Data do Abastecimeto', 'Filtros[abastecimento_data]'); ?>
                    <?php echo CHtml::dateField('Filtros[abastecimento_data]', '', array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>    
            <div id="sintetico" class="tab-pane fade">
                <h3>Veículos Sintético</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/VeiculosSintetico'), 'get', array('target'=>'_blank')); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Veículo', 'Filtros[veiculos_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculos_id]', '', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_descricao','veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Tipo', 'Filtros[veiculo_tipo]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[veiculo_tipo]', '', CHtml::listData(Gg_tipo_veiculos::model()->findAll(array('order'=>'tipo_nome')), 'tipos_id', 'tipo_nome'), array('class'=>'form-control', 'empty'=>'')); ?> 
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Status', 'Filtros[status_veiculo_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[status_veiculo_id]', '', CHtml::listData(Gg_status_veiculos::model()->findAll(array('order'=>'status_veiculos_id')), 'status_veiculos_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
                </div>
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Secretaria', 'Filtros[secretarias_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[secretarias_id]', '', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
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

