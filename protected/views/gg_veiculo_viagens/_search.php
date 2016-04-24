<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
            <div class="col-md-4">
		<?php echo $form->label($model,'viagens_id'); ?>
		<?php echo $form->textField($model,'viagens_id',array('class'=>'form-control', 'size'=>11,'maxlength'=>11)); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->label($model,'veiculos_id'); ?>
		<?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa','condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'empty'=>'')); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->label($model,'motoristas_id'); ?>
		<?php echo $form->dropdownlist($model, 'motoristas_id', CHtml::listData(Gg_motoristas::model()->findAll(array('order'=>'motorista_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'motoristas_id', 'motorista_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                 'empty'=>'')); ?>
            </div>    
	</div>

	<div class="form-group">
            <div class="col-md-4">
		<?php echo $form->label($model,'data_saida'); ?>
		<?php echo $form->dateField($model,'data_saida',array('class'=>'form-control')); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->label($model,'quilometragem_saida'); ?>
		<?php echo $form->textField($model,'quilometragem_saida',array('class'=>'form-control')); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->label($model,'hora_saida'); ?>
		<?php echo $form->textField($model,'hora_saida',array('class'=>'form-control hora')); ?>
            </div>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'destino'); ?>
		<?php echo $form->textField($model,'destino',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
	</div>
    
        <div class="form-group">
            <div class="col-md-4">
		<?php echo $form->label($model,'data_chegada'); ?>
		<?php echo $form->dateField($model,'data_chegada',array('class'=>'form-control')); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->label($model,'quilometragem_chegada'); ?>
		<?php echo $form->textField($model,'quilometragem_chegada',array('class'=>'form-control')); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->label($model,'hora_chegada'); ?>
		<?php echo $form->textField($model,'hora_chegada',array('class'=>'form-control hora')); ?>
            </div>
	</div>
        
        <div class="form-group field-control">
            <?php echo $form->labelEx($model,'avaria'); ?>                
            <?php echo $form->checkBox($model,'avaria'); ?>
            <?php echo $form->error($model,'avaria'); ?>
        </div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->