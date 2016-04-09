<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('motoristas_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->motoristas_id), array('view', 'id'=>$data->motoristas_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorista_nome')); ?>:</b>
	<?php echo CHtml::encode($data->motorista_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorista_cpf')); ?>:</b>
	<?php echo CHtml::encode($data->motorista_cpf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorista_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->motorista_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motorista_telefone')); ?>:</b>
	<?php echo CHtml::encode($data->motorista_telefone); ?>
	<br />


</div>