<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group field-control">
		<?php echo $form->label($model,'check_list_id'); ?>
		<?php echo $form->textField($model,'check_list_id',array('class'=>'form-control', 'size'=>11,'maxlength'=>11)); ?>
        </div>

	<div class="form-group field-control">
		<?php echo $form->label($model,'veiculos_id'); ?>
		<?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa','condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'empty'=>'')); ?>
        </div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->