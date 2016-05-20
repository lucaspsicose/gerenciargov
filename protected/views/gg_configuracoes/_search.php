<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'configuracoes_id'); ?>
		<?php echo $form->textField($model,'configuracoes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'configuracao_field'); ?>
		<?php echo $form->textField($model,'configuracao_field',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'configuracao_valor'); ?>
		<?php echo $form->textField($model,'configuracao_valor',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarios_id'); ?>
		<?php echo $form->textField($model,'usuarios_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefeituras_id'); ?>
		<?php echo $form->textField($model,'prefeituras_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'secretarias_id'); ?>
		<?php echo $form->textField($model,'secretarias_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->