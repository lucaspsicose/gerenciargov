<div class="bs-example wow">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-check-list-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="form-group field-control">
            <?php if (!$model->isNewRecord) : ?>
                <div class="form-group field-control">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa')), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'Readonly'=>true,'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($model->isNewRecord) : ?>
                <div class="form-group field-control">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'].' and status_veiculos_id = 1')), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                     'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
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
		<?php echo $form->labelEx($model,'retrovisor'); ?>
		<?php echo $form->checkBox($model,'retrovisor'); ?>
		<?php echo $form->error($model,'retrovisor'); ?>
            </div>
        </div>
        
        <div class="form-group">
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

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'freio'); ?>
		<?php echo $form->checkBox($model,'freio'); ?>
		<?php echo $form->error($model,'freio'); ?>
            </div>
        </div>

        <div class="form-group">
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

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'luz_freio'); ?>
		<?php echo $form->checkBox($model,'luz_freio'); ?>
		<?php echo $form->error($model,'luz_freio'); ?>
            </div>
        </div>

        <div class="form-group">
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

            <div class="col-md-4">
                <?php echo $form->labelEx($model,'nivel_agua'); ?>
                <?php echo $form->checkBox($model,'nivel_agua'); ?>
                <?php echo $form->error($model,'nivel_agua'); ?>
            </div>    
        </div>

        <div class="form-group">
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

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'porta'); ?>
		<?php echo $form->checkBox($model,'porta'); ?>
		<?php echo $form->error($model,'porta'); ?>
            </div>    
        </div>

        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'seta_dianteria'); ?>
		<?php echo $form->checkBox($model,'seta_dianteria'); ?>
		<?php echo $form->error($model,'seta_dianteria'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'seta_trazeira'); ?>
		<?php echo $form->checkBox($model,'seta_trazeira'); ?>
		<?php echo $form->error($model,'seta_trazeira'); ?>
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