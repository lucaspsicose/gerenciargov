<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuarios_id), array('view', 'id'=>$data->usuarios_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_nome')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_login')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_senha')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_senha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfis_id')); ?>:</b>
	<?php echo CHtml::encode($data->perfis_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_email')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_email); ?>
	<br />


</div>