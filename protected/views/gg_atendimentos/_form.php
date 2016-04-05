<div class="bs-example">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gg-atendimentos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>
	
        <?php echo $form->hiddenField($model,'usuarios_id', array('value' => Yii::app()->session['user_id'])); ?>
        <?php echo $form->hiddenField($model,'secretarias_id', array('value' => Yii::app()->session['active_secretarias_id'])); ?>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'atendimento_protocolo'); ?>
		<?php echo $form->textField($model,'atendimento_protocolo', array('class'=>'form-control', 'readOnly'=>'readOnly', 'value'=>  Yii::app()->functions->generateProtocolo()), array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'atendimento_protocolo'); ?>
	</div>

	<div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model,'status_id', Yii::app()->functions->getComboStatus(), array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>
        
        <div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'atendimento_inclusao'); ?>
		<?php echo $form->textField($model,'atendimento_inclusao', array('class'=>'form-control', 'readOnly'=>'readOnly', 'value'=>  date('d/m/Y') )); ?>
		<?php echo $form->error($model,'atendimento_inclusao'); ?>
	</div>
        
        <div class="form-group col-md-3">
		<?php echo $form->labelEx($model,'atendimento_alteracao'); ?>
		<?php echo $form->textField($model,'atendimento_alteracao', array('class'=>'form-control', 'readOnly'=>'readOnly', 'value'=>  date('d/m/Y H:m') )); ?>
		<?php echo $form->error($model,'atendimento_alteracao'); ?>
	</div>
        
        <div class="form-group col-md-11">
		<?php echo $form->labelEx($model,'solicitantes_id'); ?>
		<?php echo $form->hiddenfield($model,'solicitantes_id'); ?>
                <?php echo CHtml::textField('solicitante_nome', '', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'solicitantes_id'); ?>
	</div>
        <div class="form-group col-md-1">
                <?php echo CHtml::label('Cad.', '') ?>
                <?php echo CHtml::link('', '#test-form', array('class'=>'popup-with-form btn btn-circle form-control mais')); ?>
        </div>  

	<div class="form-group col-md-10">
		<?php echo $form->labelEx($model,'atendimento_endereco'); ?>
		<?php echo $form->textField($model,'atendimento_endereco', array('class'=>'form-control'), array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'atendimento_endereco'); ?>
	</div>

	<div class="form-group col-md-2">
		<?php echo $form->labelEx($model,'atendimento_numero'); ?>
		<?php echo $form->textField($model,'atendimento_numero', array('class'=>'form-control'), array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'atendimento_numero'); ?>
	</div>

	<div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'atendimento_bairro'); ?>
		<?php echo $form->textField($model,'atendimento_bairro', array('class'=>'form-control'), array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'atendimento_bairro'); ?>
	</div>
        
        <div class="form-group col-md-6">
		<?php echo $form->labelEx($model,'servicos_id'); ?>
		<?php echo $form->textField($model,'servicos_id', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'servicos_id'); ?>
	</div>
        
        <div class="row">
            <div class="form-group col-lg-12">
                    <?php echo $form->labelEx($model,'atendimento_descricao_status'); ?>
                    <?php echo $form->textArea($model,'atendimento_descricao_status', array('class'=>'form-control'), array('size'=>60,'maxlength'=>2000)); ?>
                    <?php echo $form->error($model,'atendimento_descricao_status'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-lg-12">
                    <?php echo $form->labelEx($model,'atendimento_descricao'); ?>
                    <?php echo $form->textArea($model,'atendimento_descricao', array('class'=>'form-control'), array('size'=>60,'maxlength'=>2000)); ?>
                    <?php echo $form->error($model,'atendimento_descricao'); ?>
            </div>
        </div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Inserir' : 'Salvar', array('class'=>'btn btn-default')); ?>
	</div>
        <?php 
        $solicitante = new Gg_usuarios;
        $solic=  Yii::app()->functions->getSolicitantes();
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
        'htmlOptions'=>array(
        'class'=>'mfp-hide modal-content',    
        ),
        'action'=>'/gereciargov/gg_usuarios/create',
        
)); 

?>
	<p class="note">Os campos marcados com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $new_user->errorSummary($solicitante); ?>
        
        <?php echo $new_user->hiddenfield($solicitante, 'usuarios_id'); ?>
        
        <?php echo CHtml::hiddenField('lightbox', Yii::app()->request->pathInfo); ?>

	<div class="form-group">
		<?php echo $new_user->labelEx($solicitante,'usuario_nome'); ?>
		<?php echo $new_user->textField($solicitante,'usuario_nome',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $new_user->error($solicitante,'usuario_nome'); ?>
	</div>

	<div class="form-group">
		<?php echo $new_user->labelEx($solicitante,'usuario_login'); ?>
		<?php echo $new_user->textField($solicitante,'usuario_login',array('class'=>'form-control', 'size'=>60,'maxlength'=>80)); ?>
		<?php echo $new_user->error($solicitante,'usuario_login'); ?>
	</div>

	<div class="form-group">
		<?php echo $new_user->labelEx($solicitante,'usuario_senha'); ?>
		<?php echo $new_user->passwordField($solicitante,'usuario_senha',array('class'=>'form-control', 'id'=>'exampleInputPassword1', 'size'=>60,'maxlength'=>128)); ?>
		<?php echo $new_user->error($solicitante,'usuario_senha'); ?>
	</div>

	<div class="form-group">
            <?php $functions = new Functions(); ?>
		<?php echo $new_user->labelEx($solicitante,'perfis_id'); ?>
		<?php echo $new_user->dropDownList($solicitante,'perfis_id', $functions->getComboPerfil(), array('class'=>'form-control')); ?>
		<?php echo $new_user->error($solicitante,'perfis_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $new_user->labelEx($solicitante,'usuario_email'); ?>
		<?php echo $new_user->textField($solicitante,'usuario_email',array('class'=>'form-control', 'size'=>60,'maxlength'=>60)); ?>
		<?php echo $new_user->error($solicitante,'usuario_email'); ?>
	</div>
        
        <div class="form-group">
            <h3>Secretarias</h3>
        </div>
        
        
        <div class="form-group">
		<?php echo Yii::app()->functions->getSecretarias($solicitante->usuarios_id); ?>
	</div>
        
        
        <div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Gravar' : 'Salvar', array('class'=>'btn btn-default')); ?>
        </div>	
        

<?php $this->endWidget(); ?>