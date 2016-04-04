<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'servicos_id'); ?>
		<?php echo $form->textField($model,'servicos_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servico_nome'); ?>
		<?php echo $form->textField($model,'servico_nome',array('size'=>60,'maxlength'=>80)); ?>
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