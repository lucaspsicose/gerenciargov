<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->servicos_id), array('view', 'id'=>$data->servicos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servico_nome')); ?>:</b>
	<?php echo CHtml::encode($data->servico_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretarias_id')); ?>:</b>
	<?php echo CHtml::encode($data->secretarias_id); ?>
	<br />


</div>