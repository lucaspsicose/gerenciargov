<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('manut_agendas_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->manut_agendas_id), array('view', 'id'=>$data->manut_agendas_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculos_id')); ?>:</b>
	<?php echo CHtml::encode($data->veiculos_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manut_agenda_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->manut_agenda_descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manut_agenda_data')); ?>:</b>
	<?php echo CHtml::encode($data->manut_agenda_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manut_agenda_quilometragem')); ?>:</b>
	<?php echo CHtml::encode($data->manut_agenda_quilometragem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alertando')); ?>:</b>
	<?php echo CHtml::encode($data->alertando); ?>
	<br />


</div>