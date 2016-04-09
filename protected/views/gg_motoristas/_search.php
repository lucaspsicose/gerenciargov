<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'motorista_nome'); ?>
		<?php echo $form->textField($model,'motorista_nome',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'motorista_cpf'); ?>
		<?php echo $form->textField($model,'motorista_cpf',array('class'=>'form-control cpf','size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'motorista_categoria'); ?>
		<?php echo $form->textField($model,'motorista_categoria',array('class'=>'form-control','size'=>2,'maxlength'=>2)); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->
