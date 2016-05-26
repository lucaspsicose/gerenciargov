<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-responsaveis-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        
	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'responsavel_nome'); ?>
		<?php echo $form->textField($model,'responsavel_nome',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'responsavel_nome'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'responsavel_cpf'); ?>
		<?php echo $form->textField($model,'responsavel_cpf',array('class'=>'form-control cpf','size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'responsavel_cpf'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'responsavel_telefone'); ?>
		<?php echo $form->textField($model,'responsavel_telefone',array('class'=>'form-control fixo_cel','size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'responsavel_telefone'); ?>
	</div>

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'funcao'); ?>
		<?php echo $form->textField($model,'funcao',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'funcao'); ?>
	</div>

	<div class="form-group row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->