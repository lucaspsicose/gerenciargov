<div class="bs-example wow">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-veiculo-viagens-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        
        <div class="form-group">
            <?php if (!$model->isNewRecord) : ?>
                <div class="col-md-6">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa')), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 'Readonly'=>true,'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($model->isNewRecord) : ?>
                <div class="col-md-6">
                    <?php echo $form->labelEx($model,'veiculos_id'); ?>
                    <?php echo $form->dropdownlist($model, 'veiculos_id', CHtml::listData(Gg_veiculos::model()->findAll(array('order'=>'veiculo_placa', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'].' and status_veiculos_id = 1')), 'veiculos_id', 'veiculo_placa'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                     'empty'=>'')); ?>
                    <?php echo $form->error($model,'veiculos_id'); ?>
                </div>
            <?php endif; ?>
            

            <div class="col-md-6">
		<?php echo $form->labelEx($model,'motoristas_id'); ?>
                <?php echo $form->dropdownlist($model, 'motoristas_id', CHtml::listData(Gg_motoristas::model()->findAll(array('order'=>'motorista_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'motoristas_id', 'motorista_nome'), array('class'=>'form-control', 
                                                                                                                                                                                                                                                                                                 'empty'=>'')); ?>
		<?php echo $form->error($model,'motoristas_id'); ?>
            </div>
	</div>

	<div class="form-group">
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'data_saida'); ?>
		<?php echo $form->dateField($model,'data_saida',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'data_saida'); ?>
            </div>
            
            <div class="col-md-4">
		<?php echo $form->labelEx($model,'quilometragem_saida'); ?>
		<?php echo $form->textField($model,'quilometragem_saida',array('class'=>'form-control','maxlength'=>6)); ?>
		<?php echo $form->error($model,'quilometragem_saida'); ?>
            </div>

            <div class="col-md-4">
		<?php echo $form->labelEx($model,'hora_saida'); ?>
		<?php echo $form->textField($model,'hora_saida',array('class'=>'form-control hora')); ?>
		<?php echo $form->error($model,'hora_saida'); ?>
            </div>
	</div>	

	<div class="form-group">
            <?php echo $form->labelEx($model,'destino'); ?>
            <?php echo $form->textArea($model,'destino',array('class'=>'form-control','size'=>60,'maxlength'=>2000)); ?>
            <?php echo $form->error($model,'destino'); ?>
        </div>
        
         <?php if (!$model->isNewRecord) : ?>
            <div class="form-group">
                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'data_chegada'); ?>
                    <?php echo $form->dateField($model,'data_chegada',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'data_chegada'); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'quilometragem_chegada'); ?>
                    <?php echo $form->textField($model,'quilometragem_chegada',array('class'=>'form-control', 'maxlength'=>6)); ?>
                    <?php echo $form->error($model,'quilometragem_chegada'); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->labelEx($model,'hora_chegada'); ?>
                    <?php echo $form->textField($model,'hora_chegada',array('class'=>'form-control hora')); ?>
                    <?php echo $form->error($model,'hora_chegada'); ?>
                </div>
            </div>
        <?php endif; ?>
        
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Gravar' : 'Salvar', array('class'=>'btn btn-default')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->