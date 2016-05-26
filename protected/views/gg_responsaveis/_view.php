<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsaveis_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->responsaveis_id), array('view', 'id'=>$data->responsaveis_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel_nome')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel_nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel_cpf')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel_cpf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel_telefone')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel_telefone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('funcao')); ?>:</b>
	<?php echo CHtml::encode($data->funcao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefeituras_id')); ?>:</b>
	<?php echo CHtml::encode($data->prefeituras_id); ?>
	<br />


</div>