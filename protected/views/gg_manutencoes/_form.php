<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-manutencoes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        <?php echo $form->errorSummary($model); ?>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        
        <div class="form-group">
            <div class="col-md-6">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'].' and status_veiculos_id = 1')), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                         'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
            </div>

            <div class="col-md-6">
                    <?php echo $form->labelEx($model,'manutencao_quilometragem'); ?>
                    <?php echo $form->textField($model,'manutencao_quilometragem',array('class'=>'form-control','maxlength'=>6)); ?>
                    <?php echo $form->error($model,'manutencao_quilometragem'); ?>
            </div>    
        </div>
	

	<div class="form-group field-control">
		<?php echo $form->labelEx($model,'manutencao_descricao'); ?>
		<?php echo $form->textArea($model,'manutencao_descricao',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'manutencao_descricao'); ?>
	</div>
        
        <div class="form-group">
            <div class="col-md-6">
                    <?php echo $form->labelEx($model,'manutencao_preco'); ?>
                    <?php echo $form->textField($model,'manutencao_preco',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'manutencao_preco'); ?>
            </div>

            <div class="col-md-6">
                    <?php echo $form->labelEx($model,'manutencao_data'); ?>
                    <?php echo $form->dateField($model,'manutencao_data',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'manutencao_data'); ?>
            </div>    
        </div>
	

	<div class="form-group row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->