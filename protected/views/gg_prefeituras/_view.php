<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->prefeituras_id), array('view', 'id'=>$data->prefeituras_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeitura_nome')); ?>:</b>
	<?php echo CHtml::encode($data->prefeitura_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeitura_municipio')); ?>:</b>
	<?php echo CHtml::encode($data->prefeitura_municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estados_id')); ?>:</b>
	<?php echo CHtml::encode($data->estados_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeitura_endereco')); ?>:</b>
	<?php echo CHtml::encode($data->prefeitura_endereco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeitura_numero')); ?>:</b>
	<?php echo CHtml::encode($data->prefeitura_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeitura_telefone')); ?>:</b>
	<?php echo CHtml::encode($data->prefeitura_telefone); ?>
	<br />


</div>