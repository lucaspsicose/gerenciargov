<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-servicos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'servico_nome'); ?>
		<?php echo $form->textField($model,'servico_nome',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'servico_nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'secretarias_id'); ?>
		<?php echo $form->textField($model,'secretarias_id'); ?>
		<?php echo $form->error($model,'secretarias_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->