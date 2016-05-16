<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'manutencoes_id'); ?>
		<?php echo $form->textField($model,'manutencoes_id',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculos_id'); ?>
		<?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa','condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'empty'=>'')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manutencao_quilometragem'); ?>
		<?php echo $form->textField($model,'manutencao_quilometragem', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manutencao_descricao'); ?>
		<?php echo $form->textField($model,'manutencao_descricao',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manutencao_preco'); ?>
		<?php echo $form->textField($model,'manutencao_preco',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'manutencao_data'); ?>
		<?php echo $form->dateField($model,'manutencao_data',array('class'=>'form-control')); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->