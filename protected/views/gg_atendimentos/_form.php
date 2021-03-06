<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-atendimentos-form',
	'enableAjaxValidation'=>false,
)); 
    if ($model->isNewRecord) {
        $protocolo = Yii::app()->functions->generateProtocolo();
    } else {
        $protocolo = Gg_atendimentos::model()->atendimento_protocolo;
    }
    
    if (!$model->isNewRecord) {
        Yii::app()->clientScript->registerScript('controle', "
        $('.controle').attr('disabled', 'disabled');");
    }

?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        
        <?php echo $form->errorSummary($model); ?>
	
        <?php echo $form->hiddenField($model,'usuarios_id', array('value' => Yii::app()->session['user_id'])); ?>
        <?php echo $form->hiddenField($model,'secretarias_origem_id', array('value' => Yii::app()->session['active_secretarias_id'])); ?>
        <?php echo $form->error($model,'secretarias_origem_id'); ?>

            <div class="form-group">
                <div class="col-md-6">
                    <?php echo $form->labelEx($model,'atendimento_protocolo'); ?>
                    <?php echo $form->textField($model,'atendimento_protocolo', array('class'=>'form-control', 'readOnly'=>'readOnly', 'value'=> $protocolo), array('size'=>50,'maxlength'=>50)); ?>
                    <?php echo $form->error($model,'atendimento_protocolo'); ?>
                </div>
                
                <div class="col-md-6">
                        <?php echo $form->labelEx($model,'atendimento_inclusao'); ?>
                        <?php if (!$model->isNewRecord) : ?>
                        <?php echo $form->textField($model,'atendimento_inclusao', array('class'=>'form-control', 'readOnly'=>'readOnly' )); ?>
                        <?php echo $form->error($model,'atendimento_inclusao'); ?>
                        <?php else : ?> 
                        <?php echo CHtml::textField('Date', date('d/m/Y'), array('class'=>'form-control', 'readOnly'=>'readOnly' )); ?>
                        <?php endif; ?>
                </div>
                
            </div>
            
            <div class="form-group">
                <div class="col-md-4">
                        <?php echo $form->labelEx($model,'secretarias_id'); ?>
                        <?php echo $form->dropdownlist($model, 'secretarias_id', CHtml::listData(Gg_secretarias::model()->findAll(array('order'=>'secretaria_nome', 'condition'=>'prefeituras_id = '.Yii::app()->session['active_prefeituras_id'])), 'secretarias_id', 'secretaria_nome'), array('class'=>'form-control controle', 
                                                                                                                                                                                                                                                                                                 'empty'=>'Selecione a Secretaria')); ?>
                        <?php echo $form->error($model,'secretarias_id'); ?>
                </div>
                
                <div class="col-md-4">
                        <?php echo $form->labelEx($model,'status_id'); ?>
                        <?php echo $form->dropDownList($model,'status_id', Yii::app()->functions->getComboStatus(), array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'status_id'); ?>
                </div>

                <div class="col-md-4">
                        <?php echo $form->labelEx($model,'data_previsao_servico'); ?>
                        <?php echo $form->dateField($model, 'data_previsao_servico',  array('class'=>'form-control controle')); ?>
                        <?php echo $form->error($model,'data_previsao_servico'); ?>
                </div>

                
            </div>

            <div class="form-group">
                <div class="col-md-9">
                    <?php echo $form->labelEx($model,'solicitantes_id'); ?>
                    <?php echo $form->hiddenfield($model,'solicitantes_id'); ?>
                    <?php echo CHtml::textField('solicitante_nome', Yii::app()->functions->getSolicitanteNomeById($model->solicitantes_id), array('class'=>'form-control controle')); ?>
                    <?php echo $form->error($model,'solicitantes_id'); ?>
                </div>

                <div class="form-group col-md-3">
                        <?php echo CHtml::label('Novo Munícipe', '') ?>
                        <?php echo CHtml::link('Cadastrar Solicitante', '#test-form', array('class'=>'popup-with-form btn btn-info form-control controle')); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-10">
                        <?php echo $form->labelEx($model,'atendimento_endereco'); ?>
                        <?php echo $form->textField($model,'atendimento_endereco', array('class'=>'form-control controle'), array('size'=>60,'maxlength'=>2000)); ?>
                        <?php echo $form->error($model,'atendimento_endereco'); ?>
                </div>

                <div class="form-group col-md-2">
                        <?php echo $form->labelEx($model,'atendimento_numero'); ?>
                        <?php echo $form->textField($model,'atendimento_numero', array('class'=>'form-control controle'), array('size'=>10,'maxlength'=>10)); ?>
                        <?php echo $form->error($model,'atendimento_numero'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                        <?php echo $form->labelEx($model,'atendimento_bairro'); ?>
                        <?php echo $form->textField($model,'atendimento_bairro', array('class'=>'form-control controle'), array('size'=>60,'maxlength'=>60)); ?>
                        <?php echo $form->error($model,'atendimento_bairro'); ?>
                </div>

                <div class="form-group col-md-6">
                        <?php echo $form->labelEx($model,'descricao_servico'); ?>
                        <?php echo $form->textField($model,'descricao_servico', array('class'=>'form-control controle')); ?>
                        <?php echo $form->error($model,'descricao_servico'); ?>
                </div>
            </div>
            
            <div class="form-group field-control">
                    <?php echo $form->labelEx($model,'atendimento_descricao'); ?>
                    <?php echo $form->textArea($model,'atendimento_descricao', array('class'=>'form-control controle'), array('size'=>60,'maxlength'=>2000)); ?>
                    <?php echo $form->error($model,'atendimento_descricao'); ?>
            </div>
        
            <?php if (!$model->isNewRecord) : ?>
                <div class="form-group">
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'responsavel_servico'); ?>
                        <?php echo $form->textField($model, 'responsavel_servico', array('class'=>'form-control'), array('size'=>80, 'maxlength'=>80)); ?>
                        <?php echo $form->error($model, 'responsavel_servico'); ?>
                    </div>
                    
                    <div class="col-md-6">
                        <?php echo $form->labelEx($model, 'data_conclusao_servico'); ?>
                        <?php echo $form->dateField($model, 'data_conclusao_servico', array('class'=>'form-control')); ?>
                        <?php echo $form->error($model, 'data_conclusao_servico'); ?>
                    </div>
                </div>
                <div class="form-group field-control">
                        <?php echo $form->labelEx($model,'atendimento_descricao_status'); ?>
                        <?php echo $form->textArea($model,'atendimento_descricao_status', array('class'=>'form-control'), array('size'=>60,'maxlength'=>2000)); ?>
                        <?php echo $form->error($model,'atendimento_descricao_status'); ?>
                </div>
            
            <?php endif; ?>

            <div class="form-group">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
            </div>
            
            
        <?php 
        $solicitante = new Gg_solicitantes;
        $solic=  Yii::app()->functions->getSolicitantes(Yii::app()->session['active_prefeituras_id']);
        $array_solic = implode("|", $solic);
        ?>
        <script>
        var i, array_produtos, string_array;
        var message = [13];
        //recebe a string com elementos separados, vindos do PHP
        string_array = "<?php echo $array_solic; ?>";
        //transforma esta string em um array próprio do Javascript
        array_solic = string_array.split("|");
        
        $(document).on('focus', '#solicitante_nome', function() // quando uma tecla for pressionada no campo nomeNCM
		{
			$('#solicitante_nome').autocomplete(
		    {
		      source: array_solic, // cria um autocomplete dos valores
		      minLength: 0,
		      autoFocus: true,
		      select: function( event, ui ) 
		      {
		      	var item = ui.item.value;
		      	item = item.slice(0, item.indexOf(':'));
		      	$('#Gg_atendimentos_solicitantes_id').val(item);
		      },
		      response: function(event, ui) 
		      {
	              if (ui.content.length === 0) 
	              {
	              	message[1] = 0;
	                $("#emptySolicitantes").text("Nenhum resultado encontrado.");
	              } 
	              else 
	              {
	              	message[1] = 1;
	                $("#emptySolicitantes").empty();
	              }
        	  }
		    });
		});    
        </script>
           

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
    
$new_user=$this->beginWidget('CActiveForm', array(
	'id'=>'test-form',
	'enableAjaxValidation'=>TRUE,
        'enableClientValidation'=>true,
        'htmlOptions'=>array(
        'class'=>'mfp-hide modal-content',    
        ),
        'action'=>  Yii::app()->request->baseUrl.'/gg_solicitantes/create',
        
)); 

?>
<h2>Cadastro de Solicitantes</h2>
	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
        
	<?php echo $form->errorSummary($model); ?>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo CHtml::label('Física/Jurídica', 'cpf_cnpj'); ?>
            </div>
            <div class="form-group">
                <?php echo CHtml::radioButtonList('cpf_cnpj', 'cpf', array('cpf'=>'CPF', 'cnpj'=>'CNPJ'), array('class'=>'radio-inline')); ?>
            </div>
        </div>
        
        <?php echo CHtml::hiddenField('atendimentos', Yii::app()->request->pathInfo) ?>
        <?php echo $form->hiddenField($model,'prefeituras_id', array('value' => Yii::app()->session['active_prefeituras_id'])); ?>
        
        <div class="form-group col-md-12">
                <?php echo $new_user->labelEx($solicitante,'solicitante_nome'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_nome', array('class'=>'has-error')); ?>
        </div>

        <div class="form-group col-lg-3">
                <?php echo $new_user->labelEx($solicitante,'solicitante_telefone'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_telefone',array('class'=>'form-control tel', 'size'=>15,'maxlength'=>15)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_telefone'); ?>
        </div>

        <div class="form-group col-lg-3">
                <?php echo $new_user->labelEx($solicitante,'solicitante_celular'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_celular',array('class'=>'form-control cel', 'size'=>15,'maxlength'=>15)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_celular'); ?>
        </div>

        <div class="form-group col-lg-3">
                <?php echo $new_user->labelEx($solicitante,'solicitante_email'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_email'); ?>
        </div>

        <div class="form-group col-md-3">
                <?php echo $new_user->labelEx($solicitante,'solicitante_cpf_cnpj'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_cpf_cnpj',array('class'=>'form-control cpf', 'id'=>'cpf-cnpj', 'size'=>16,'maxlength'=>16)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_cpf_cnpj'); ?>
        </div>

        <div class="form-group col-md-9">
                <?php echo $new_user->labelEx($solicitante,'solicitante_endereco'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_endereco',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_endereco'); ?>
        </div>

        <div class="form-group col-md-3">
                <?php echo $new_user->labelEx($solicitante,'solicitante_numero'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_numero',array('class'=>'form-control', 'size'=>15,'maxlength'=>15)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_numero'); ?>
        </div>

        <div class="form-group col-md-9">
                <?php echo $new_user->labelEx($solicitante,'solicitante_bairro'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_bairro',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_bairro'); ?>
        </div>            

        <div class="form-group col-md-3">
                <?php echo $new_user->labelEx($solicitante,'solicitante_data_nascimento'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_data_nascimento',array('class'=>'form-control data')); ?>
                <?php echo $new_user->error($solicitante,'solicitante_data_nascimento'); ?>
        </div>

        <div class="form-group col-md-6">
                <?php echo $new_user->labelEx($solicitante,'solicitante_rg'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_rg',array('class'=>'form-control', 'size'=>30,'maxlength'=>30)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_rg'); ?>
        </div>

        <div class="form-group col-md-6">
                <?php echo $new_user->labelEx($solicitante,'solicitante_titulo_eleitor'); ?>
                <?php echo $new_user->textField($solicitante,'solicitante_titulo_eleitor',array('class'=>'form-control', 'size'=>30,'maxlength'=>30)); ?>
                <?php echo $new_user->error($solicitante,'solicitante_titulo_eleitor'); ?>
        </div>

        <div class="form-group row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-info')); ?>
        </div>
        

<?php $this->endWidget(); ?>