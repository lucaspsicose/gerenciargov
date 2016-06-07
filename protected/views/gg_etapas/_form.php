<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-etapas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>

	<div class="form-group">
            <div class="col-md-6">
		<?php echo $form->label($model,'obras_id'); ?>
		<?php echo $form->dropdownlist($model, 'obras_id', CHtml::listData(Gg_obras::model()->findAll(array('order'=>'obra_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'obras_id', 'obra_nome'), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'obras_id'); ?>
            </div>
            
            <div class="col-md-6">
		<?php echo $form->label($model,'responsaveis_id'); ?>
		<?php echo $form->dropdownlist($model, 'responsaveis_id', CHtml::listData(Gg_responsaveis::model()->findAll(array('order'=>'responsavel_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'responsaveis_id', 'responsavel_nome'), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'responsaveis_id'); ?>
            </div>
        </div>
        <div class="form-group field-control">
		<?php echo $form->labelEx($model,'etapa_descricao'); ?>
		<?php echo $form->textArea($model,'etapa_descricao',array('size'=>60,'maxlength'=>2000,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'etapa_descricao'); ?>
	</div>
        
        <div class="form-group">
            <div class="col-md-6">
		<?php echo $form->labelEx($model,'etapa_data_inicial'); ?>
		<?php echo $form->dateField($model,'etapa_data_inicial',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'etapa_data_inicial'); ?>
            </div>

            <div class="col-md-6">
		<?php echo $form->labelEx($model,'etapa_data_final'); ?>
		<?php echo $form->dateField($model,'etapa_data_final',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'etapa_data_final'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6">
		<?php echo $form->labelEx($model,'etapa_saldo'); ?>
		<?php echo $form->textField($model,'etapa_saldo',array('class'=>'form-control','size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'etapa_saldo'); ?>
            </div>

            <div class="col-md-6">
		<?php echo $form->labelEx($model,'etapa_status'); ?>
		<?php echo $form->dropdownlist($model,'etapa_status' ,array('A Iniciar' => 'A Iniciar', 'Em Andamento' => 'Em Andamento', 'Concluída' => 'Concluída'),array('class'=>'form-control'));?>
		<?php echo $form->error($model,'etapa_status'); ?>
            </div>
        </div>

	<div class="form-group">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
            </div>

<?php $this->endWidget(); ?>

</div><!-- form -->