<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'atendimento_protocolo'); ?>
		<?php echo $form->textField($model,'atendimento_protocolo',array('class'=>'form-control', 'size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->dropdownlist($model, 'status_id', CHtml::listData(Gg_status::model()->findAll(array('order'=>'status_nome')), 'status_id', 'status_nome'), array('class'=>'form-control','empty'=>'')); ?>
	</div>
    
	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->