<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->veiculos_id), array('view', 'id'=>$data->veiculos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secretarias_id')); ?>:</b>
	<?php echo CHtml::encode($data->secretarias_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_descricao')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_placa')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_placa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_chassi')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_chassi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_quilometragem')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_quilometragem); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_fabricante')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_fabricante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculo_modelo')); ?>:</b>
	<?php echo CHtml::encode($data->veiculo_modelo); ?>
	<br />

	*/ ?>

</div>