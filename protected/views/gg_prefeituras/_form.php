<div class="bs-example wow">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-prefeituras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'prefeitura_nome'); ?>
		<?php echo $form->textField($model,'prefeitura_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'prefeitura_nome'); ?>
	</div>

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'prefeitura_municipio'); ?>
		<?php echo $form->textField($model,'prefeitura_municipio',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'prefeitura_municipio'); ?>
	</div>

	<div class="form-group col-md-9">
		<?php echo $form->labelEx($model,'prefeitura_endereco'); ?>
		<?php echo $form->textField($model,'prefeitura_endereco',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'prefeitura_endereco'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'prefeitura_numero'); ?>
		<?php echo $form->textField($model,'prefeitura_numero',array('class'=>'form-control', 'size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'prefeitura_numero'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'estados_id'); ?>
		<?php echo $form->dropdownlist($model, 'estados_id', CHtml::listData(Gg_estados::model()->findAll(array('order'=>'estado_nome')), 'estados_id', 'estado_nome'), array('class'=>'form-control', 'empty'=>'Selecione o Estado')); ?>
		<?php echo $form->error($model,'estados_id'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'prefeitura_telefone'); ?>
		<?php echo $form->textField($model,'prefeitura_telefone',array('class'=>'form-control tel', 'size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'prefeitura_telefone'); ?>
	</div>
        
        <?php if ($model->isNewRecord) : ?>
        
            <hr>
            <h2>Usuário Padrão</h2>
            <hr>

            <div class="form-group field-control">
                <?php echo CHtml::label('Nome', 'Gg_usuarios[usuario_nome]', array('required'=>'required')); ?>
                <?php echo CHtml::textField('Gg_usuarios[usuario_nome]', '', array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo CHtml::error(Gg_usuarios::model(), 'usuario_nome'); ?>
            </div>

            <div class="form-group col-md-6">
                <?php echo CHtml::label('Login', 'Gg_usuarios[usuario_login]', array('required'=>'required')); ?>
                <?php echo CHtml::textField('Gg_usuarios[usuario_login]', '', array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo CHtml::error(Gg_usuarios::model(), 'usuario_login'); ?>
            </div>

            <div class="form-group col-md-6">
                <?php echo CHtml::label('Senha', 'Gg_usuarios[usuario_senha]', array('required'=>'required')); ?>
                <?php echo CHtml::passwordField('Gg_usuarios[usuario_senha]', '', array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo CHtml::error(Gg_usuarios::model(), 'usuario_login'); ?>
            </div>

            <div class="form-group field-control">
                <?php echo CHtml::label('Email', 'Gg_usuarios[usuario_email]', array('required'=>'required')); ?>
                <?php echo CHtml::emailField('Gg_usuarios[usuario_email]', '', array('class'=>'form-control', 'id'=>'exampleInputPassword1', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo CHtml::error(Gg_usuarios::model(), 'usuario_email'); ?>
            </div>
            
        <?php endif; ?>

	<div class="form-group row buttons field-control">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->