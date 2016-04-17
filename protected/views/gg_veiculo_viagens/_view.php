<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('viagens_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->viagens_id), array('view', 'id'=>$data->viagens_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculos_id')); ?>:</b>
	<?php echo CHtml::encode($data->veiculos_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motoristas_id')); ?>:</b>
	<?php echo CHtml::encode($data->motoristas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_saida')); ?>:</b>
	<?php echo CHtml::encode($data->data_saida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quilometragem_saida')); ?>:</b>
	<?php echo CHtml::encode($data->quilometragem_saida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_saida')); ?>:</b>
	<?php echo CHtml::encode($data->hora_saida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:</b>
	<?php echo CHtml::encode($data->destino); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_chegada')); ?>:</b>
	<?php echo CHtml::encode($data->data_chegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quilometragem_chegada')); ?>:</b>
	<?php echo CHtml::encode($data->quilometragem_chegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_chegada')); ?>:</b>
	<?php echo CHtml::encode($data->hora_chegada); ?>
	<br />

	*/ ?>

</div>