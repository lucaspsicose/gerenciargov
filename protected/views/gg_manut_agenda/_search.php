<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'manut_agendas_id'); ?>
		<?php echo $form->textField($model,'manut_agendas_id',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculos_id'); ?>
		<?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa','condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'empty'=>'')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manut_agenda_descricao'); ?>
		<?php echo $form->textField($model,'manut_agenda_descricao',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manut_agenda_data'); ?>
		<?php echo $form->textField($model,'manut_agenda_data',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manut_agenda_quilometragem'); ?>
		<?php echo $form->dateField($model,'manut_agenda_quilometragem',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'alertando'); ?>
                <?php echo $form->dropdownlist($model,'alertando' ,array('NÃO' => 'NÃO', 'SIM' => 'SIM'),array('class'=>'form-control', 'empty' => ''));?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->