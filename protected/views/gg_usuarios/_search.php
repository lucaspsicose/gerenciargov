<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'usuario_nome'); ?>
		<?php echo $form->textField($model,'usuario_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'usuario_email'); ?>
		<?php echo $form->textField($model,'usuario_email',array('class'=>'form-control','size'=>60,'maxlength'=>60)); ?>
	</div>

        <?php echo CHtml::submitButton('Pesquisar', array('class'=>'btn btn-default')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->