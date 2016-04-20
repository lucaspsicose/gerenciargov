<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-motoristas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        <?php echo $form->errorSummary($model); ?>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        
	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'motorista_nome'); ?>
		<?php echo $form->textField($model,'motorista_nome',array('class'=>'form-control','size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'motorista_nome'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'motorista_cpf'); ?>
		<?php echo $form->textField($model,'motorista_cpf',array('class'=>'form-control cpf','size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'motorista_cpf'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'motorista_categoria'); ?>
		<?php echo $form->textField($model,'motorista_categoria',array('class'=>'form-control','onkeyup'=>'this.value=this.value.toUpperCase();','onkeypress'=>'return Onlychars(event)', 'size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'motorista_categoria'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'motorista_telefone'); ?>
		<?php echo $form->textField($model,'motorista_telefone',array('class'=>'form-control fixo_cel','size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'motorista_telefone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>
        
<script>
//funçao para aceitar somente letras
    function Onlychars(e)
    {
            var tecla=new Number();
            if(window.event) {
                    tecla = e.keyCode;
            }
            else if(e.which) {
                    tecla = e.which;
            }
            else {
                    return true;
            }
            if((tecla >= "48") && (tecla <= "57")){
                    return false;
            }
    }

</script>

</div><!-- form -->