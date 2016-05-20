<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('configuracoes_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->configuracoes_id), array('view', 'id'=>$data->configuracoes_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('configuracao_field')); ?>:</b>
	<?php echo CHtml::encode($data->configuracao_field); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('configuracao_valor')); ?>:</b>
	<?php echo CHtml::encode($data->configuracao_valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefeituras_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretarias_id')); ?>:</b>
	<?php echo CHtml::encode($data->secretarias_id); ?>
	<br />


</div>