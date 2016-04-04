<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-secretarias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'secretaria_nome'); ?>
		<?php echo $form->textField($model,'secretaria_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'secretaria_nome'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'secretaria_secretario'); ?>
		<?php echo $form->textField($model,'secretaria_secretario',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'secretaria_secretario'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'secretaria_telefone'); ?>
		<?php echo $form->textField($model,'secretaria_telefone',array('class'=>'form-control tel', 'size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'secretaria_telefone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'secretaria_email'); ?>
		<?php echo $form->textField($model,'secretaria_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'secretaria_email'); ?>
	</div>
        
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Gravar' : 'Salvar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->