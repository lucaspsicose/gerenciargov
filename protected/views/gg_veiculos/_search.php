<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'secretarias_id'); ?>
                <?php echo $form->dropdownlist($model, 'secretarias_id', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                 'empty'=>'')); ?>
		
	</div>
    
        <div class="form-group">
		<?php echo $form->label($model,'status_veiculos_id'); ?>
                <?php echo $form->dropdownlist($model, 'status_veiculos_id', CHtml::listData(Gg_status_veiculos::model()->findAll(array('order'=>'status_veiculos_id')), 'status_veiculos_id', 'status_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_descricao'); ?>
		<?php echo $form->textField($model,'veiculo_descricao',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_placa'); ?>
		<?php echo $form->textField($model,'veiculo_placa',array('class'=>'form-control placa','style' => 'text-transform: uppercase','size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_chassi'); ?>
		<?php echo $form->textField($model,'veiculo_chassi',array('class'=>'form-control', 'size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_tipo'); ?>
                <?php echo $form->dropdownlist($model, 'veiculo_tipo', CHtml::listData(Gg_tipo_veiculos::model()->findAll(array('order'=>'tipo_nome')), 'tipos_id', 'tipo_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_fabricante'); ?>
		<?php echo $form->textField($model,'veiculo_fabricante',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'veiculo_modelo'); ?>
		<?php echo $form->textField($model,'veiculo_modelo',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->