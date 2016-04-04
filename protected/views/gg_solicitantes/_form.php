<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-solicitantes-form',
	'enableAjaxValidation'=>false,
)); ?>
        <p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_nome'); ?>
		<?php echo $form->textField($model,'solicitante_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'solicitante_nome'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_telefone'); ?>
		<?php echo $form->textField($model,'solicitante_telefone',array('class'=>'form-control tel', 'size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'solicitante_telefone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_celular'); ?>
		<?php echo $form->textField($model,'solicitante_celular',array('class'=>'form-control cel', 'size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'solicitante_celular'); ?>
	</div>
        
        <div class="form-group">
            <?php echo CHtml::label('Física/Jurídica', 'cpf_cnpj'); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::radioButtonList('cpf_cnpj', '', array('cpf'=>'CPF', 'cnpj'=>'CNPJ'), array('class'=>'radio-inline')); ?>
        </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_cpf_cnpj'); ?>
		<?php echo $form->textField($model,'solicitante_cpf_cnpj',array('class'=>'form-control cpf', 'size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'solicitante_cpf_cnpj'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_endereco'); ?>
		<?php echo $form->textField($model,'solicitante_endereco',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'solicitante_endereco'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_numero'); ?>
		<?php echo $form->textField($model,'solicitante_numero',array('class'=>'form-control', 'size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'solicitante_numero'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_bairro'); ?>
		<?php echo $form->textField($model,'solicitante_bairro',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'solicitante_bairro'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_email'); ?>
		<?php echo $form->textField($model,'solicitante_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'solicitante_email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_data_nascimento'); ?>
		<?php echo $form->textField($model,'solicitante_data_nascimento',array('class'=>'form-control data')); ?>
		<?php echo $form->error($model,'solicitante_data_nascimento'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_rg'); ?>
		<?php echo $form->textField($model,'solicitante_rg',array('class'=>'form-control', 'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'solicitante_rg'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'solicitante_titulo_eleitor'); ?>
		<?php echo $form->textField($model,'solicitante_titulo_eleitor',array('class'=>'form-control', 'size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'solicitante_titulo_eleitor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->