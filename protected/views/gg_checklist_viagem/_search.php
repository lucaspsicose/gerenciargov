<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group field-control">
		<?php echo $form->label($model,'checklist_viagens_id'); ?>
		<?php echo $form->textField($model,'checklist_viagens_id', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group field-control">
		<?php echo $form->label($model,'viagens_id'); ?>
		<?php echo $form->textField($model,'viagens_id', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group field-control">
		<?php echo $form->label($model,'data_alteracao'); ?>
		<?php echo $form->textField($model,'data_alteracao', array('class'=>'form-control')); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->