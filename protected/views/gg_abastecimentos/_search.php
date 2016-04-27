<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'abastecimentos_id'); ?>
		<?php echo $form->textField($model,'abastecimentos_id', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculos_id'); ?>
		<?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa','condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'empty'=>'')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'abastecimento_quilometragem'); ?>
		<?php echo $form->textField($model,'abastecimento_quilometragem', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'combustivel_id'); ?>
		<?php echo $form->dropdownlist($model, 'combustivel_id', CHtml::listData(Gg_tipo_combustivel::model()->findAll(array('order'=>'combustivel_id')), 'combustivel_id', 'combustivel_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'abastecimento_litro'); ?>
		<?php echo $form->textField($model,'abastecimento_litro', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'abastecimento_preco'); ?>
		<?php echo $form->textField($model,'abastecimento_preco', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'abastecimento_data'); ?>
		<?php echo $form->dateField($model,'abastecimento_data', array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->