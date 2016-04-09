<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-motoristas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'motorista_nome'); ?>
		<?php echo $form->textField($model,'motorista_nome',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'motorista_nome'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'motorista_cpf'); ?>
		<?php echo $form->textField($model,'motorista_cpf',array('class'=>'form-control cpf','size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'motorista_cpf'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'motorista_categoria'); ?>
		<?php echo $form->textField($model,'motorista_categoria',array('class'=>'form-control','size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'motorista_categoria'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'motorista_telefone'); ?>
		<?php echo $form->textField($model,'motorista_telefone',array('class'=>'form-control cel', 'size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'motorista_telefone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->