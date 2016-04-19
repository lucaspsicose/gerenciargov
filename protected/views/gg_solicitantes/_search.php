<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'solicitante_nome'); ?>
		<?php echo $form->textField($model,'solicitante_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'solicitante_cpf_cnpj'); ?>
		<?php echo $form->textField($model,'solicitante_cpf_cnpj',array('class'=>'form-control', 'size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'solicitante_email'); ?>
		<?php echo $form->textField($model,'solicitante_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->