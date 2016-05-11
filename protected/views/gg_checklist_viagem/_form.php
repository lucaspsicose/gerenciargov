<div class="bs-example wow">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-checklist-viagem-form',
	'enableAjaxValidation'=>false,
)); 
    if (isset($_GET['veiculo'])) {
        $veiculo = Gg_veiculos::model()->find(array('condition'=>'veiculos_id = '.$_GET['veiculo']));
    } else {
        $veiculos_id = $model->viagens->veiculos->veiculos_id;
        $veiculo = Gg_veiculos::model()->find(array('condition'=>'veiculos_id = '.$veiculos_id));
    }
    
?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        <?php if ($model->isNewRecord) : ?>
            <?php echo $form->hiddenField($model,'viagens_id', array('value' => $_GET['id'])); ?>
        <?php endif; ?>
        <?php if (!$model->isNewRecord) : ?>
            <?php echo $form->hiddenField($model,'viagens_id', array('value' =>$model->viagens_id)); ?>
        <?php endif; ?>
        

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group field-control">
            <?php echo CHtml::label('Veículo', ''); ?>
            <?php echo CHtml::textField('veiculo_nome', $veiculo->veiculo_descricao.' ('.$veiculo->veiculo_placa.')', array('class'=>'form-control ', 'readOnly'=>'readOnly')); ?>                                                                                                                                                                                                                                                                                 
            <?php echo $form->error($model,'veiculos_id'); ?>
        </div>

	<div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'buzina'); ?>
		<?php echo $form->checkBox($model,'buzina'); ?>
		<?php echo $form->error($model,'buzina'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'cinto'); ?>
		<?php echo $form->checkBox($model,'cinto'); ?>
		<?php echo $form->error($model,'cinto'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'retrovisor_e'); ?>
		<?php echo $form->checkBox($model,'retrovisor_e'); ?>
		<?php echo $form->error($model,'retrovisor_e'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'retrovisor_d'); ?>
		<?php echo $form->checkBox($model,'retrovisor_d'); ?>
		<?php echo $form->error($model,'retrovisor_d'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'farois'); ?>
		<?php echo $form->checkBox($model,'farois'); ?>
		<?php echo $form->error($model,'farois'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'fluido_freio'); ?>
		<?php echo $form->checkBox($model,'fluido_freio'); ?>
		<?php echo $form->error($model,'fluido_freio'); ?>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'freio'); ?>
		<?php echo $form->checkBox($model,'freio'); ?>
		<?php echo $form->error($model,'freio'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'freio_mao'); ?>
		<?php echo $form->checkBox($model,'freio_mao'); ?>
		<?php echo $form->error($model,'freio_mao'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'lataria'); ?>
		<?php echo $form->checkBox($model,'lataria'); ?>
		<?php echo $form->error($model,'lataria'); ?>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'luz_freio'); ?>
		<?php echo $form->checkBox($model,'luz_freio'); ?>
		<?php echo $form->error($model,'luz_freio'); ?>
            </div>
            
            <div class="col-md-4">
                <?php echo $form->labelEx($model,'luz_re'); ?>
                <?php echo $form->checkBox($model,'luz_re'); ?>
                <?php echo $form->error($model,'luz_re'); ?>
            </div>

            <div class="col-md-4">
                <?php echo $form->labelEx($model,'luz_painel'); ?>
                <?php echo $form->checkBox($model,'luz_painel'); ?>
                <?php echo $form->error($model,'luz_painel'); ?>
            </div>               
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <?php echo $form->labelEx($model,'nivel_agua'); ?>
                <?php echo $form->checkBox($model,'nivel_agua'); ?>
                <?php echo $form->error($model,'nivel_agua'); ?>
            </div> 
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'nivel_oleo'); ?>
		<?php echo $form->checkBox($model,'nivel_oleo'); ?>
		<?php echo $form->error($model,'nivel_oleo'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'pneu'); ?>
		<?php echo $form->checkBox($model,'pneu'); ?>
		<?php echo $form->error($model,'pneu'); ?>
            </div>              
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'porta'); ?>
		<?php echo $form->checkBox($model,'porta'); ?>
		<?php echo $form->error($model,'porta'); ?>
            </div>  
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'seta_dianteira_e'); ?>
		<?php echo $form->checkBox($model,'seta_dianteira_e'); ?>
		<?php echo $form->error($model,'seta_dianteira_e'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'seta_dianteira_d'); ?>
		<?php echo $form->checkBox($model,'seta_dianteira_d'); ?>
		<?php echo $form->error($model,'seta_dianteira_d'); ?>
            </div>    
        </div>
        
        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'seta_traseira_e'); ?>
		<?php echo $form->checkBox($model,'seta_traseira_e'); ?>
		<?php echo $form->error($model,'seta_traseira_e'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'seta_traseira_d'); ?>
		<?php echo $form->checkBox($model,'seta_traseira_d'); ?>
		<?php echo $form->error($model,'seta_traseira_d'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'vidros'); ?>
		<?php echo $form->checkBox($model,'vidros'); ?>
		<?php echo $form->error($model,'vidros'); ?>
            </div>    
        </div>

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'observacao'); ?>
		<?php echo $form->textArea($model,'observacao',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'observacao'); ?>
	</div>

	<div class="form-group field-control">
                <?php if ($model->isNewRecord) : ?>
                <?php echo $form->labelEx($model,'data_alteracao'); ?> 
                <?php echo CHtml::textField('Date', date('d/m/Y'), array('class'=>'form-control', 'readOnly'=>'readOnly' )); ?>
                <?php endif; ?>

                <?php /* echo $form->labelEx($model,'data_alteracao'); ?>
                <?php if (!$model->isNewRecord) : ?>
                <?php echo $form->textField($model,'data_alteracao', array('class'=>'form-control', 'readOnly'=>'readOnly' )); ?>
                <?php echo $form->error($model,'data_alteracao'); ?>
                <?php else : ?> 
                <?php echo CHtml::textField('Date', date('d/m/Y'), array('class'=>'form-control', 'readOnly'=>'readOnly' )); ?>
                <?php endif; */ ?>
	</div>

	<div class="form-group row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->