<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfis_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->perfis_id), array('view', 'id'=>$data->perfis_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfil_nome')); ?>:</b>
	<?php echo CHtml::encode($data->perfil_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfil_capabilidade')); ?>:</b>
	<?php echo CHtml::encode($data->perfil_capabilidade); ?>
	<br />


</div>