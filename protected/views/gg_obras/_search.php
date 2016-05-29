<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'responsaveis_id'); ?>
		<?php echo $form->dropdownlist($model, 'responsaveis_id', CHtml::listData(Gg_responsaveis::model()->findAll(array('order'=>'responsavel_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'responsaveis_id', 'responsavel_nome'), array('class'=>'form-control', 'empty'=>'')); ?>
        </div>

	<div class="form-group">
		<?php echo $form->label($model,'obra_nome'); ?>
		<?php echo $form->textField($model,'obra_nome',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'obra_local'); ?>
		<?php echo $form->textField($model,'obra_local',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'obra_data_inicial'); ?>
		<?php echo $form->dateField($model,'obra_data_inicial',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'obra_data_final'); ?>
		<?php echo $form->dateField($model,'obra_data_final',array('class'=>'form-control')); ?>
	</div>
    
        <div class="form-group">
		<?php echo $form->label($model,'status_obra'); ?>
                <?php echo $form->dropdownlist($model,'status_obra' ,array('A Iniciar' => 'A Iniciar', 'Em Andamento' => 'Em Andamento', 'Concluída' => 'Concluída'),array('class'=>'form-control', 'empty' => ''));?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'obra_concluido'); ?>
		<?php echo $form->textField($model,'obra_concluido',array('size'=>3,'maxlength'=>3, 'class'=>'form-control')); ?>
	</div>

	<?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->