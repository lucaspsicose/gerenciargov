<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretarias_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->secretarias_id), array('view', 'id'=>$data->secretarias_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretaria_nome')); ?>:</b>
	<?php echo CHtml::encode($data->secretaria_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretaria_secretario')); ?>:</b>
	<?php echo CHtml::encode($data->secretaria_secretario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretaria_telefone')); ?>:</b>
	<?php echo CHtml::encode($data->secretaria_telefone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretaria_email')); ?>:</b>
	<?php echo CHtml::encode($data->secretaria_email); ?>
	<br />


</div>