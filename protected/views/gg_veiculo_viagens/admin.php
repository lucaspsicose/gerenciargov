<?php
$this->breadcrumbs=array(
	'Gg Veiculo Viagens'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cadastrar Nova Viagem', 'url'=>array('create')),
        array('label'=>'Lista de Viagens', 'url'=>array('admin')),
        array('label'=>'Checklist de Viagem', 'url'=>array('gg_checklist_viagem/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gg-veiculo-viagens-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->setPageTitle('Viagens');
?>
<div class="container"><!-- Limita o conteudo na pagina -->
    <h1>Consulta de Viagens</h1>

    <?php echo CHtml::link('Pesquisa Avançada','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
            'model'=>$model,
    )); ?>
    </div><!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'gg-veiculo-viagens-grid',
            'dataProvider'=>$model->search(),
            'columns'=>array(
                    'viagens_id',
                    'veiculos.veiculo_descricao',
                    'veiculos.veiculo_placa',
                    'motorista.motorista_nome',
                    'data_saida',
                    'quilometragem_saida',
                    //'hora_saida',
                    'destino',
                    'data_chegada',
                    'quilometragem_chegada',
                    'quilometragem_rodada',
                    //'hora_chegada',
                    array(
                            'class'=>'CButtonColumn',
                            'template'=>'{view}',
                            'viewButtonImageUrl'=>  Yii::app()->request->baseUrl.'/assets/img/view.png',
                            'viewButtonOptions'=>array('class'=>'view-button'),
                    ),      
            ),
            'itemsCssClass' => 'table table-responsive',
            'pagerCssClass' => 'text-center',
            'pager' => array(
                'htmlOptions'=> array('class'=>'pagination'),
                'header'=>'',
                ),
    )); ?>

    <div class="btn-base">
                    <?php $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'btn btn-info'),
                        'encodeLabel' => false,
                        'items' => array(
                        array('label' => 'Cadastrar Nova Viagem', 'url'=>array('create')),
                        ),
                    ));?> 
    </div>

    <div class="btn-base">
                    <?php $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'btn btn-info'),
                        'encodeLabel' => false,
                        'items' => array(
                        array('label' => 'Checklist de Viagem', 'url'=>array('gg_checklist_viagem/admin')),
                        ),
                    ));?> 
    </div>
</div>

