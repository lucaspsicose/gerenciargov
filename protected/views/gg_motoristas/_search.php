<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'motoristas_id'); ?>
		<?php echo $form->textField($model,'motoristas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motorista_nome'); ?>
		<?php echo $form->textField($model,'motorista_nome',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motorista_cpf'); ?>
		<?php echo $form->textField($model,'motorista_cpf',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motorista_categoria'); ?>
		<?php echo $form->textField($model,'motorista_categoria',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motorista_telefone'); ?>
		<?php echo $form->textField($model,'motorista_telefone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->