<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'secretarias_id'); ?>
		<?php echo $form->textField($model,'secretarias_id', array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'secretaria_nome'); ?>
		<?php echo $form->textField($model,'secretaria_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'secretaria_secretario'); ?>
		<?php echo $form->textField($model,'secretaria_secretario',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	
        <?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->