<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'etapas_id'); ?>
		<?php echo $form->textField($model,'etapas_id',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'obras_id'); ?>
		<?php echo $form->dropdownlist($model, 'obras_id', CHtml::listData(Gg_obras::model()->findAll(array('order'=>'obra_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'obras_id', 'obra_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
        </div>

	<div class="form-group">
		<?php echo $form->label($model,'responsaveis_id'); ?>
		<?php echo $form->dropdownlist($model, 'responsaveis_id', CHtml::listData(Gg_responsaveis::model()->findAll(array('order'=>'responsavel_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'responsaveis_id', 'responsavel_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
        </div>
    
        <div class="form-group">
		<?php echo $form->label($model,'etapa_data_inicial'); ?>
		<?php echo $form->dateField($model,'etapa_data_inicial',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'etapa_data_final'); ?>
		<?php echo $form->dateField($model,'etapa_data_final',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'etapa_status'); ?>
                <?php echo $form->dropdownlist($model,'etapa_status' ,array('A Iniciar' => 'A Iniciar', 'Em Andamento' => 'Em Andamento', 'Concluída' => 'Concluída'),array('class'=>'form-control', 'empty' => ''));?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->