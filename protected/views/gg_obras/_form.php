<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-obras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>

	<div class="form-group field-control">
		<?php echo $form->label($model,'responsaveis_id'); ?>
		<?php echo $form->dropdownlist($model, 'responsaveis_id', CHtml::listData(Gg_responsaveis::model()->findAll(array('order'=>'responsavel_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'responsaveis_id', 'responsavel_nome'), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'responsaveis_id'); ?>
        </div>

        <div class="form-group">
            <div class="col-md-6">
		<?php echo $form->labelEx($model,'obra_nome'); ?>
		<?php echo $form->textField($model,'obra_nome',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'obra_nome'); ?>
            </div>
            
            <div class="col-md-6">
		<?php echo $form->labelEx($model,'obra_local'); ?>
		<?php echo $form->textField($model,'obra_local',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'obra_local'); ?>
            </div>
        </div>
        

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'obra_descricao'); ?>
		<?php echo $form->textArea($model,'obra_descricao',array('size'=>60,'maxlength'=>2000,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'obra_descricao'); ?>
	</div>	

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'obra_orc_previsto'); ?>
		<?php echo $form->textField($model,'obra_orc_previsto',array('size'=>12,'maxlength'=>12,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'obra_orc_previsto'); ?>
	</div>
        
        <div class="form-group">
            <div class="col-md-6">
		<?php echo $form->labelEx($model,'obra_prev_inicial'); ?>
		<?php echo $form->dateField($model,'obra_prev_inicial',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'obra_prev_inicial'); ?>
            </div>

            <div class="col-md-6">
		<?php echo $form->labelEx($model,'obra_prev_final'); ?>
		<?php echo $form->dateField($model,'obra_prev_final',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'obra_prev_final'); ?>
            </div>
        </div>

	<div class="form-group row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->