<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('abastecimentos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->abastecimentos_id), array('view', 'id'=>$data->abastecimentos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('veiculos_id')); ?>:</b>
	<?php echo CHtml::encode($data->veiculos_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abastecimento_quilometragem')); ?>:</b>
	<?php echo CHtml::encode($data->abastecimento_quilometragem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('combustivel_id')); ?>:</b>
	<?php echo CHtml::encode($data->combustivel_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abastecimento_litro')); ?>:</b>
	<?php echo CHtml::encode($data->abastecimento_litro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abastecimento_preco')); ?>:</b>
	<?php echo CHtml::encode($data->abastecimento_preco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abastecimento_data')); ?>:</b>
	<?php echo CHtml::encode($data->abastecimento_data); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefeituras_id); ?>
	<br />

	*/ ?>

</div>