<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-usuarios-form',
	'enableAjaxValidation'=>TRUE,
        
)); ?>
	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php echo $form->hiddenfield($model, 'usuarios_id'); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'usuario_nome'); ?>
		<?php echo $form->textField($model,'usuario_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'usuario_nome'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'usuario_login'); ?>
		<?php echo $form->textField($model,'usuario_login',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'usuario_login'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'usuario_senha'); ?>
                <?php echo CHtml::passwordField('Gg_usuarios[usuario_senha]', '', array('class'=>'form-control', 'id'=>'exampleInputPassword1', 'size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'usuario_senha'); ?>
                <?php if (!$model->isNewRecord) { echo Yii::t('default', 'Deixe em branco para não alterar a senha'); } ?>
	</div>
        
        <?php if((Yii::app()->session['perfil'] == '1') || ($model->isNewRecord)) : ?>
	<div class="form-group">
            <?php $functions = new Functions(); ?>
		<?php echo $form->labelEx($model,'perfis_id'); ?>
		<?php echo $form->dropDownList($model,'perfis_id', $functions->getComboPerfil(), array('class'=>'form-control', 
                                                                                                       'disabled'=>  Yii::app()->session['perfil'] !== '1'?'disabled':'',
                                                                                                       'options' => Yii::app()->session['perfil'] !== '1'?array('3'=>array('selected'=>true)):'',)); ?>
		<?php echo $form->error($model,'perfis_id'); ?>
	</div>
        <?php else : ?>
        <div class="form-group">
		<?php echo $form->hiddenfield($model, 'perfis_id'); ?>
		<?php echo $form->error($model,'perfis_id'); ?>
	</div>
        <?php endif; ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'usuario_email'); ?>
		<?php echo $form->textField($model,'usuario_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'usuario_email'); ?>
	</div>
        
        <?php if (Yii::app()->session['perfil'] == '1') : ?>
        <div class="form-group">
            <h3>Secretarias</h3>
        </div>
        
        <div class="form-group">
		<?php echo Yii::app()->functions->getSecretarias($model->usuarios_id); ?>
	</div>
        <?php     endif; ?>
        
        
        <div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Gravar' : 'Salvar', array('class'=>'btn btn-default')); ?>
        </div>	
        

<?php $this->endWidget(); ?>

</div><!-- form -->