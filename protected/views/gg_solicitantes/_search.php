<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'solicitantes_id'); ?>
		<?php echo $form->textField($model,'solicitantes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_nome'); ?>
		<?php echo $form->textField($model,'solicitante_nome',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_telefone'); ?>
		<?php echo $form->textField($model,'solicitante_telefone',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_celular'); ?>
		<?php echo $form->textField($model,'solicitante_celular',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_cpf_cnpj'); ?>
		<?php echo $form->textField($model,'solicitante_cpf_cnpj',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_endereco'); ?>
		<?php echo $form->textField($model,'solicitante_endereco',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_numero'); ?>
		<?php echo $form->textField($model,'solicitante_numero',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_bairro'); ?>
		<?php echo $form->textField($model,'solicitante_bairro',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_email'); ?>
		<?php echo $form->textField($model,'solicitante_email',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_data_nascimento'); ?>
		<?php echo $form->textField($model,'solicitante_data_nascimento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_rg'); ?>
		<?php echo $form->textField($model,'solicitante_rg',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante_titulo_eleitor'); ?>
		<?php echo $form->textField($model,'solicitante_titulo_eleitor',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->