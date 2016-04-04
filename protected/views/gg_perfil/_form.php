<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-perfil-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'perfil_nome'); ?>
		<?php echo $form->textField($model,'perfil_nome',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'perfil_nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perfil_capabilidade'); ?>
		<?php echo $form->textField($model,'perfil_capabilidade'); ?>
		<?php echo $form->error($model,'perfil_capabilidade'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->