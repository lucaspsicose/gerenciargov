<div class="container">
    <div class="col-md-12 career-head">
    <h1>Relatórios</h1>
    </div>
    <!--<ul class="page-footer-list" style="background-color: #F4F4F4; font-size: 18px;">
        <li>
          <i class="fa fa-angle-right"></i>
          <a href="<?php echo $this->createUrl('relatorio_aniversariantes'); ?>">Aniversariantes do Mês</a>
        </li>
        <li>
          <i class="fa fa-angle-right"></i>
          <a href="<?php echo $this->createUrl('municipes_cadastrados'); ?>">Munícipes Cadastrados</a>
        </li>
    </ul>-->
    <section class="tab wow fadeInLeft">
        <header class="panel-heading tab-bg-dark-navy-blue">
          <ul class="nav nav-tabs nav-justified ">
            <li class="active">
              <a data-toggle="tab" href="#birthday">
                Aniversariantes Do Mês
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#municipes">
                Munícipes Cadastrados
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#relatorios">
                Atendimentos
              </a>
            </li>
          </ul>
        </header>
        <div class="panel-body">
          <div class="tab-content tasi-tab">
            <div id="birthday" class="tab-pane fade in active">
                <?php echo CHtml::beginForm($this->createUrl('relatorios/aniversariantes'), 'get'); ?>
    
                <div class="form-group field-control">
                    <?php echo CHtml::label('Mês do Nascimento', 'mes'); ?>
                    <?php echo CHtml::dropDownList('mes', '', Yii::app()->functions->getMesesdoAno(), array('class'=>'form-control')); ?>
                </div>

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div id="municipes" class="tab-pane fade">
                <?php echo CHtml::beginForm($this->createUrl('relatorios/municipes'), 'get'); ?>
    
                <div class="form-group field-control">
                    <?php echo CHtml::label('Nome do Munícipe', 'nome'); ?>
                    <?php echo CHtml::textField('nome', '', array('class'=>'form-control')); ?>
                </div>    

                <div class="form-group">
                    <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
                </div>
                <?php echo CHtml::endForm(); ?>
            </div>
            <div id="relatorios" class="tab-pane fade">
                <h3>Atendimentos Por Munícipes</h3>
                <?php echo CHtml::beginForm($this->createUrl('relatorios/atendimentosporsolicitantes'), 'get'); ?>
    
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Secretaria', 'Filtros[secretarias_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[secretarias_id]', '', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                  'empty'=>'')); ?> 
                </div>  
                
                <div class="form-group col-md-6">
                    <?php echo CHtml::label('Status', 'Filtros[status_id]'); ?>
                    <?php echo CHtml::dropdownlist('Filtros[status_id]', '', CHtml::listData(Gg_status::model()->findAll(array('order'=>'status_id')), 'status_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
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

