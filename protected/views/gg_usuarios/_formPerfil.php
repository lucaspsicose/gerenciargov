<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-usuarios-formPerfil',
	'enableAjaxValidation'=>TRUE,
        
)); ?>
        
        <?php echo $form->hiddenfield($model, 'usuarios_id'); ?>
        <?php echo $form->hiddenfield($model, 'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])) ?>

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'usuario_nome'); ?>
		<?php echo $form->textField($model,'usuario_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'usuario_nome'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'usuario_login'); ?>
		<?php echo $form->textField($model,'usuario_login',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'usuario_login'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'usuario_senha'); ?>
                <?php echo CHtml::passwordField('Gg_usuarios[usuario_senha]', '', array('class'=>'form-control', 'id'=>'exampleInputPassword1', 'size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'usuario_senha'); ?>
                <?php if (!$model->isNewRecord) { echo Yii::t('default', 'Deixe em branco para não alterar a senha'); } ?>
	</div>

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'usuario_email'); ?>
		<?php echo $form->emailField($model,'usuario_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'usuario_email'); ?>
	</div>
        
        
        <div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Gravar' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>	
        

<?php $this->endWidget(); ?>

</div><!-- form -->

