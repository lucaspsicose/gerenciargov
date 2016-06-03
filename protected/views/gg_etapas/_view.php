<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('etapas_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->etapas_id), array('view', 'id'=>$data->etapas_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obras_id')); ?>:</b>
	<?php echo CHtml::encode($data->obras_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsaveis_id')); ?>:</b>
	<?php echo CHtml::encode($data->responsaveis_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etapa_descicao')); ?>:</b>
	<?php echo CHtml::encode($data->etapa_descicao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etapa_data_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->etapa_data_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etapa_data_final')); ?>:</b>
	<?php echo CHtml::encode($data->etapa_data_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etapa_saldo')); ?>:</b>
	<?php echo CHtml::encode($data->etapa_saldo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('etapa_status')); ?>:</b>
	<?php echo CHtml::encode($data->etapa_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etapa_concluido')); ?>:</b>
	<?php echo CHtml::encode($data->etapa_concluido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefeituras_id); ?>
	<br />

	*/ ?>

</div>