<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'prefeituras_id'); ?>
		<?php echo $form->textField($model,'prefeituras_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefeitura_nome'); ?>
		<?php echo $form->textField($model,'prefeitura_nome',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefeitura_municipio'); ?>
		<?php echo $form->textField($model,'prefeitura_municipio',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estados_id'); ?>
		<?php echo $form->textField($model,'estados_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefeitura_endereco'); ?>
		<?php echo $form->textField($model,'prefeitura_endereco',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefeitura_numero'); ?>
		<?php echo $form->textField($model,'prefeitura_numero',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefeitura_telefone'); ?>
		<?php echo $form->textField($model,'prefeitura_telefone',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->