<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'atendimentos_id'); ?>
		<?php echo $form->textField($model,'atendimentos_id', array('class'=>'form-control', 'size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'atendimento_protocolo'); ?>
		<?php echo $form->textField($model,'atendimento_protocolo',array('class'=>'form-control', 'size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id', array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'atendimento_inclusao'); ?>
		<?php echo $form->textField($model,'atendimento_inclusao', array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'solicitantes_id'); ?>
		<?php echo $form->textfield($model, 'solicitantes_id', array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>
    
	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->