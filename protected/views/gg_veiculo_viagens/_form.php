<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-veiculo-viagens-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
                
        <div class="form-group">
            <?php if (!$model->isNewRecord) : ?>
                <div class="col-md-6">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao')), 'veiculos_id', 'veiculo_placa','veiculo_descricao'), array('class'=>'form-control', 'Readonly'=>true,'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($model->isNewRecord) : ?>
                <div class="col-md-6">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_descricao', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'].' and status_veiculos_id = 1')), 'veiculos_id', 'veiculo_placa','veiculo_descricao'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                     'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
            

            <div class="col-md-6">
		<?php echo $form->labelEx($model,'motoristas_id'); ?>
                <?php echo $form->dropdownlist($model, 'motoristas_id', CHtml::listData(Gg_motoristas::model()->findAll(array('order'=>'motorista_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'motoristas_id', 'motorista_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                 'empty'=>'')); ?>
		<?php echo $form->error($model,'motoristas_id'); ?>
            </div>
	</div>

	<div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'data_saida'); ?>
		<?php echo $form->dateField($model,'data_saida',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'data_saida'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'quilometragem_saida'); ?>
		<?php echo $form->textField($model,'quilometragem_saida',array('class'=>'form-control','maxlength'=>6)); ?>
		<?php echo $form->error($model,'quilometragem_saida'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'hora_saida'); ?>
		<?php echo $form->textField($model,'hora_saida',array('class'=>'form-control hora')); ?>
		<?php echo $form->error($model,'hora_saida'); ?>
            </div>
	</div>	

	<div class="form-group field-control">
            <?php echo $form->labelEx($model,'destino'); ?>
            <?php echo $form->textArea($model,'destino',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
            <?php echo $form->error($model,'destino'); ?>
        </div>
        
        <div class="form-group field-control">
            <?php echo $form->labelEx($model,'finalidade'); ?>
            <?php echo $form->textArea($model,'finalidade',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
            <?php echo $form->error($model,'finalidade'); ?>
        </div>
        
         <?php if (!$model->isNewRecord) : ?>
            <div class="form-group">
                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'data_chegada'); ?>
                    <?php echo $form->dateField($model,'data_chegada',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'data_chegada'); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'quilometragem_chegada'); ?>
                    <?php echo $form->textField($model,'quilometragem_chegada',array('class'=>'form-control', 'maxlength'=>6)); ?>
                    <?php echo $form->error($model,'quilometragem_chegada'); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'hora_chegada'); ?>
                    <?php echo $form->textField($model,'hora_chegada',array('class'=>'form-control hora')); ?>
                    <?php echo $form->error($model,'hora_chegada'); ?>
                </div>      
            </div>
        
            <div class="form-group">
                <div class="col-md-6">
                    <?php echo $form->labelEx($model,'avaria'); ?>                
                    <?php echo $form->checkBox($model,'avaria'); ?>
                    <?php echo $form->error($model,'avaria'); ?>
                </div>
                <div class="col-md-6">
                    <?php echo CHtml::label('Registrar Avarias', '') ?>
                    <?php echo CHtml::link('Avarias', '#test-form', array('class'=>'popup-with-form btn btn-info form-control')); ?>
                </div> 
            </div>
            
        <?php endif; ?>

	<div class="form-group row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>
        
        <?php 
        $checklist = new Gg_checklist_viagem;
        ?>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
//$checklist_id = $checklist->find('veiculos_id=:veiculos_id', array(':veiculos_id'=>$checklist->veiculos_id));

$new_form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-form',
	'enableAjaxValidation'=>TRUE,
        'enableClientValidation'=>true,
        'htmlOptions'=>array(
        'class'=>'mfp-hide modal-content',    
        ),
        'action'=>  Yii::app()->request->baseUrl.'/gg_checklist_viagem/create',
        
)); 

?>
<h2>Checklist</h2>
<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        
        <?php echo CHtml::hiddenField('viagens', Yii::app()->request->pathInfo) ?>
        <?php echo $new_form->hiddenField($checklist,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        <?php echo $new_form->hiddenField($checklist,'viagens_id', array('value' => $model->viagens_id)); ?>
	<?php echo $new_form->errorSummary($checklist); ?>

	<div class="form-group field-control">
            <?php if (!$model->isNewRecord) : ?>
                <div class="form-group field-control">
                    <?php echo $new_form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $new_form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa')), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'Readonly'=>true,'empty'=>'')); ?>
                    <?php echo $new_form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
	</div>

	<div class="form-group">
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'buzina'); ?>
		<?php echo $new_form->checkBox($checklist,'buzina'); ?>
		<?php echo $new_form->error($checklist,'buzina'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'cinto'); ?>
		<?php echo $new_form->checkBox($checklist,'cinto'); ?>
		<?php echo $new_form->error($checklist,'cinto'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'retrovisor_e'); ?>
		<?php echo $new_form->checkBox($checklist,'retrovisor_e'); ?>
		<?php echo $new_form->error($checklist,'retrovisor_e'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'retrovisor_d'); ?>
		<?php echo $new_form->checkBox($checklist,'retrovisor_d'); ?>
		<?php echo $new_form->error($checklist,'retrovisor_d'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'farois'); ?>
		<?php echo $new_form->checkBox($checklist,'farois'); ?>
		<?php echo $new_form->error($checklist,'farois'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'fluido_freio'); ?>
		<?php echo $new_form->checkBox($checklist,'fluido_freio'); ?>
		<?php echo $new_form->error($checklist,'fluido_freio'); ?>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'freio'); ?>
		<?php echo $new_form->checkBox($checklist,'freio'); ?>
		<?php echo $new_form->error($checklist,'freio'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'freio_mao'); ?>
		<?php echo $new_form->checkBox($checklist,'freio_mao'); ?>
		<?php echo $new_form->error($checklist,'freio_mao'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'lataria'); ?>
		<?php echo $new_form->checkBox($checklist,'lataria'); ?>
		<?php echo $new_form->error($checklist,'lataria'); ?>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'luz_freio'); ?>
		<?php echo $new_form->checkBox($checklist,'luz_freio'); ?>
		<?php echo $new_form->error($checklist,'luz_freio'); ?>
            </div>
            
            <div class="col-md-4">
                <?php echo $new_form->labelEx($checklist,'luz_re'); ?>
                <?php echo $new_form->checkBox($checklist,'luz_re'); ?>
                <?php echo $new_form->error($checklist,'luz_re'); ?>
            </div>

            <div class="col-md-4">
                <?php echo $new_form->labelEx($checklist,'luz_painel'); ?>
                <?php echo $new_form->checkBox($checklist,'luz_painel'); ?>
                <?php echo $new_form->error($checklist,'luz_painel'); ?>
            </div>               
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <?php echo $new_form->labelEx($checklist,'nivel_agua'); ?>
                <?php echo $new_form->checkBox($checklist,'nivel_agua'); ?>
                <?php echo $new_form->error($checklist,'nivel_agua'); ?>
            </div> 
            
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'nivel_oleo'); ?>
		<?php echo $new_form->checkBox($checklist,'nivel_oleo'); ?>
		<?php echo $new_form->error($checklist,'nivel_oleo'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'pneu'); ?>
		<?php echo $new_form->checkBox($checklist,'pneu'); ?>
		<?php echo $new_form->error($checklist,'pneu'); ?>
            </div>              
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'porta'); ?>
		<?php echo $new_form->checkBox($checklist,'porta'); ?>
		<?php echo $new_form->error($checklist,'porta'); ?>
            </div>  
            
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'seta_dianteira_e'); ?>
		<?php echo $new_form->checkBox($checklist,'seta_dianteira_e'); ?>
		<?php echo $new_form->error($checklist,'seta_dianteira_e'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'seta_dianteira_d'); ?>
		<?php echo $new_form->checkBox($checklist,'seta_dianteira_d'); ?>
		<?php echo $new_form->error($checklist,'seta_dianteira_d'); ?>
            </div>    
        </div>
        
        <div class="form-group">
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'seta_traseira_e'); ?>
		<?php echo $new_form->checkBox($checklist,'seta_traseira_e'); ?>
		<?php echo $new_form->error($checklist,'seta_traseira_e'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'seta_traseira_d'); ?>
		<?php echo $new_form->checkBox($checklist,'seta_traseira_d'); ?>
		<?php echo $new_form->error($checklist,'seta_traseira_d'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $new_form->labelEx($checklist,'vidros'); ?>
		<?php echo $new_form->checkBox($checklist,'vidros'); ?>
		<?php echo $new_form->error($checklist,'vidros'); ?>
            </div>    
        </div>

	<div class="form-group field-control">
		<?php echo $new_form->labelEx($checklist,'observacao'); ?>
		<?php echo $new_form->textArea($checklist,'observacao',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
		<?php echo $new_form->error($checklist,'observacao'); ?>
	</div>

	<div class="form-group field-control">
                <?php echo $new_form->labelEx($checklist,'data_alteracao'); ?>
                <?php echo CHtml::textField('Date', date('d/m/Y'), array('class'=>'form-control', 'readOnly'=>'readOnly' )); ?>
	</div>

	<div class="form-group row buttons">
            <?php echo CHtml::submitButton($checklist->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>

