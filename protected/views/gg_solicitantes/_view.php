<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitantes_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->solicitantes_id), array('view', 'id'=>$data->solicitantes_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_nome')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_telefone')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_telefone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_celular')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_cpf_cnpj')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_cpf_cnpj); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_endereco')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_numero')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_numero); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_bairro')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_bairro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_email')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_data_nascimento')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_data_nascimento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_rg')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_rg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante_titulo_eleitor')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante_titulo_eleitor); ?>
	<br />

	*/ ?>

</div>