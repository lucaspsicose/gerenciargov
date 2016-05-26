<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'responsavel_nome'); ?>
		<?php echo $form->textField($model,'responsavel_nome',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'responsavel_cpf'); ?>
		<?php echo $form->textField($model,'responsavel_cpf',array('class'=>'form-control cpf','size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'funcao'); ?>
		<?php echo $form->textField($model,'funcao',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
	</div>
	
	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->