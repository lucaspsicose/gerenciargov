<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-abastecimentos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        
        <div class="form-group">
            <div class="col-md-6">
                <?php echo $form->labelEx($model,'veiculos_id'); ?>
                <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'veiculos_id'); ?>
            </div>

            <div class="col-md-6">
                <?php echo $form->labelEx($model,'abastecimento_quilometragem'); ?>
		<?php echo $form->textField($model,'abastecimento_quilometragem', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'abastecimento_quilometragem'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6">
                <?php echo $form->labelEx($model,'combustivel_id'); ?>
                <?php echo $form->dropdownlist($model, 'combustivel_id', CHtml::listData(Gg_tipo_combustivel::model()->findAll(array('order'=>'combustivel_id')), 'combustivel_id', 'combustivel_nome'), array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'combustivel_id'); ?>
            </div>
                
            <div class="col-md-6">
                <?php echo $form->labelEx($model,'abastecimento_litro'); ?>
		<?php echo $form->textField($model,'abastecimento_litro', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'abastecimento_litro'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-6">
                <?php echo $form->labelEx($model,'abastecimento_preco'); ?>
		<?php echo $form->textField($model,'abastecimento_preco', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'abastecimento_preco'); ?>
            </div>
                
            <div class="col-md-6">
                <?php echo $form->labelEx($model,'abastecimento_data'); ?>
		<?php echo $form->dateField($model,'abastecimento_data', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'abastecimento_data'); ?>
            </div>
        </div>

	<div class="form-group">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->