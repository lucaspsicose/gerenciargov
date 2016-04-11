<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-veiculos-form',
	'enableAjaxValidation'=>TRUE,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="form-group">
		<?php echo $form->labelEx($model,'secretarias_id'); ?>
		<?php echo $form->dropDownList($model,'secretarias_id', Yii::app()->functions->getComboSecretarias(), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'secretarias_id'); ?>
	</div>
        
        <div class="form-group">
		<?php echo $form->labelEx($model,'veiculo_descricao'); ?>
		<?php echo $form->textField($model,'veiculo_descricao',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'veiculo_descricao'); ?>	            
        </div>
        
	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'veiculo_placa'); ?>
		<?php echo $form->textField($model,'veiculo_placa',array('class'=>'form-control', 'size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'veiculo_placa'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'veiculo_chassi'); ?>
		<?php echo $form->textField($model,'veiculo_chassi',array('class'=>'form-control', 'size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'veiculo_chassi'); ?>
	</div>

	<div class="form-group col-md-4">
		<?php echo $form->labelEx($model,'veiculo_tipo'); ?>
		<?php echo $form->dropDownList($model,'veiculo_tipo', $controller->getTipoVeiculo(), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'veiculo_tipo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'veiculo_quilometragem'); ?>
		<?php echo $form->textField($model,'veiculo_quilometragem',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'veiculo_quilometragem'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'veiculo_fabricante'); ?>
		<?php echo $form->textField($model,'veiculo_fabricante',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'veiculo_fabricante'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'veiculo_modelo'); ?>
		<?php echo $form->textField($model,'veiculo_modelo',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'veiculo_modelo'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Gravar' : 'Salvar', array('class'=>'btn btn-default')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->