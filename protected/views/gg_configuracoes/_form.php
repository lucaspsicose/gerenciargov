<div class="bs-exemple">

<?php echo CHtml::beginForm($this->createUrl('gg_configuracoes/index'), 'post'); ?>

	<div class="form-group">
		<?php echo CHtml::label('Email do Responsável pela Parte Diária', 'configuracoes[email_resp_parte_diaria]'); ?>
		<?php echo CHtml::emailField('configuracoes[email_resp_parte_diaria]', '', array('class'=>'form-control', 'size'=>60,'maxlength'=>120)); ?>
	</div>
    
        <div class="form-group">
		<?php echo CHtml::label('Email do Responsável pela Parte Diária', 'configuracoes[email_oficial]'); ?>
		<?php echo CHtml::emailField('configuracoes[email_oficial]', '', array('class'=>'form-control', 'size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Salvar', array('class'=>'btn btn-info')); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->