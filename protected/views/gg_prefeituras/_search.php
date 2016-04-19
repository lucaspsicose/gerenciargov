<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'prefeitura_nome'); ?>
		<?php echo $form->textField($model,'prefeitura_nome',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'prefeitura_municipio'); ?>
		<?php echo $form->textField($model,'prefeitura_municipio',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'btn btn-info')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->