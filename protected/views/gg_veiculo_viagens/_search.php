<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'viagens_id'); ?>
		<?php echo $form->textField($model,'viagens_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculos_id'); ?>
		<?php echo $form->textField($model,'veiculos_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'motoristas_id'); ?>
		<?php echo $form->textField($model,'motoristas_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'data_saida'); ?>
		<?php echo $form->textField($model,'data_saida'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'quilometragem_saida'); ?>
		<?php echo $form->textField($model,'quilometragem_saida'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'hora_saida'); ?>
		<?php echo $form->textField($model,'hora_saida'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'destino'); ?>
		<?php echo $form->textField($model,'destino',array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'data_chegada'); ?>
		<?php echo $form->textField($model,'data_chegada'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'quilometragem_chegada'); ?>
		<?php echo $form->textField($model,'quilometragem_chegada'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'hora_chegada'); ?>
		<?php echo $form->textField($model,'hora_chegada'); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->