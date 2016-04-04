<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimentos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->atendimentos_id), array('view', 'id'=>$data->atendimentos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretarias_id')); ?>:</b>
	<?php echo CHtml::encode($data->secretarias_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_protocolo')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_protocolo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_inclusao')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_inclusao); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_alteracao')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_alteracao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitantes_id')); ?>:</b>
	<?php echo CHtml::encode($data->solicitantes_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_descricao_status')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_descricao_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_endereco')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_numero')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atendimento_bairro')); ?>:</b>
	<?php echo CHtml::encode($data->atendimento_bairro); ?>
	<br />

	*/ ?>

</div>