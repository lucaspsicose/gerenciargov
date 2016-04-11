<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'secretarias_id'); ?>
		<?php echo $form->textField($model,'secretarias_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_descricao'); ?>
		<?php echo $form->textField($model,'veiculo_descricao',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_placa'); ?>
		<?php echo $form->textField($model,'veiculo_placa',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_chassi'); ?>
		<?php echo $form->textField($model,'veiculo_chassi',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_tipo'); ?>
		<?php echo $form->textField($model,'veiculo_tipo'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_fabricante'); ?>
		<?php echo $form->textField($model,'veiculo_fabricante',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_modelo'); ?>
		<?php echo $form->textField($model,'veiculo_modelo',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->