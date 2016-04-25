<?php

$this->menu=array(
	array('label'=>'Aniversariantes do Mês', 'url'=>array('#')),
);
$this->setPageTitle('Relatórios');

?>
<div class="container career-inner">

    <h1>Aniversariantes do Mês</h1>
    
    <?php echo CHtml::beginForm($this->createUrl('relatorios/aniversariantes'), 'get'); ?>
    
    <div class="form-group field-control">
        <?php echo CHtml::label('Mês do Nascimento', 'mes'); ?>
        <?php echo CHtml::dropDownList('mes', '', Yii::app()->functions->getMesesdoAno(), array('class'=>'form-control')); ?>
    </div>    
    
    <div class="form-group">
        <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
    
    <h1>Munícipes Cadastrados</h1>
    
    <?php echo CHtml::beginForm($this->createUrl('relatorios/municipes'), 'get'); ?>
    
    <div class="form-group field-control">
        <?php echo CHtml::label('Nome do Munícipe', 'nome'); ?>
        <?php echo CHtml::textField('nome', '', array('class'=>'form-control')); ?>
    </div>    
    
    <div class="form-group">
        <?php echo CHtml::submitButton('Gerar Relatório', array('class'=>'btn btn-info')); ?>
    </div>
    <?php echo CHtml::endForm(); ?>

</div>


