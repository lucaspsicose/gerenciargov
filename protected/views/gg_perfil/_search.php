<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'perfis_id'); ?>
		<?php echo $form->textField($model,'perfis_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perfil_nome'); ?>
		<?php echo $form->textField($model,'perfil_nome',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perfil_capabilidade'); ?>
		<?php echo $form->textField($model,'perfil_capabilidade'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->