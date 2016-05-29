<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('obras_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->obras_id), array('view', 'id'=>$data->obras_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsaveis_id')); ?>:</b>
	<?php echo CHtml::encode($data->responsaveis_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_nome')); ?>:</b>
	<?php echo CHtml::encode($data->obra_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->obra_descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_local')); ?>:</b>
	<?php echo CHtml::encode($data->obra_local); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_orc_previsto')); ?>:</b>
	<?php echo CHtml::encode($data->obra_orc_previsto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_prev_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->obra_prev_inicial); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_prev_final')); ?>:</b>
	<?php echo CHtml::encode($data->obra_prev_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_saldo')); ?>:</b>
	<?php echo CHtml::encode($data->obra_saldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_data_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->obra_data_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_data_final')); ?>:</b>
	<?php echo CHtml::encode($data->obra_data_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_qte_etapa')); ?>:</b>
	<?php echo CHtml::encode($data->obra_qte_etapa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_porc_etapa')); ?>:</b>
	<?php echo CHtml::encode($data->obra_porc_etapa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obra_concluido')); ?>:</b>
	<?php echo CHtml::encode($data->obra_concluido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefeituras_id); ?>
	<br />

	*/ ?>

</div>