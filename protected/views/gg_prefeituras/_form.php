<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-prefeituras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'prefeitura_nome'); ?>
		<?php echo $form->textField($model,'prefeitura_nome',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'prefeitura_nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefeitura_municipio'); ?>
		<?php echo $form->textField($model,'prefeitura_municipio',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'prefeitura_municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estados_id'); ?>
		<?php echo $form->textField($model,'estados_id'); ?>
		<?php echo $form->error($model,'estados_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefeitura_endereco'); ?>
		<?php echo $form->textField($model,'prefeitura_endereco',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'prefeitura_endereco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefeitura_numero'); ?>
		<?php echo $form->textField($model,'prefeitura_numero',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'prefeitura_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefeitura_telefone'); ?>
		<?php echo $form->textField($model,'prefeitura_telefone',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'prefeitura_telefone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->