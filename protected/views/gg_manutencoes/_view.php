<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('manutencoes_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->manutencoes_id), array('view', 'id'=>$data->manutencoes_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculos_id')); ?>:</b>
	<?php echo CHtml::encode($data->veiculos_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manutencao_quilometragem')); ?>:</b>
	<?php echo CHtml::encode($data->manutencao_quilometragem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manutencao_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->manutencao_descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manutencao_preco')); ?>:</b>
	<?php echo CHtml::encode($data->manutencao_preco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('manutencao_data')); ?>:</b>
	<?php echo CHtml::encode($data->manutencao_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefeituras_id); ?>
	<br />


</div>