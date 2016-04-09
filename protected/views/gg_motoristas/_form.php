<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-motoristas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'motorista_nome'); ?>
		<?php echo $form->textField($model,'motorista_nome',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'motorista_nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motorista_cpf'); ?>
		<?php echo $form->textField($model,'motorista_cpf',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'motorista_cpf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motorista_categoria'); ?>
		<?php echo $form->textField($model,'motorista_categoria',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'motorista_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motorista_telefone'); ?>
		<?php echo $form->textField($model,'motorista_telefone'); ?>
		<?php echo $form->error($model,'motorista_telefone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->