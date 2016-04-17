<?php
$this->breadcrumbs=array(
	'Gg Solicitantes'=>array('index'),
	$model->solicitantes_id,
);

if (in_array(Yii::app()->session['perfil'], array(1, 2)) ) {
    $this->menu=array(
            array('label'=>'Lista de Solicitantes', 'url'=>array('admin')),
            array('label'=>'Novo Cadastro', 'url'=>array('create')),
            array('label'=>'Editar Cadastro', 'url'=>array('update', 'id'=>$model->solicitantes_id)),
            array('label'=>'Deletar Cadastro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->solicitantes_id),'confirm'=>Yii::t('zii','Confirma deletar este cadastro?'))),

    );
} else {
    $this->menu=array(
            array('label'=>'Lista de Solicitantes', 'url'=>array('admin')),
            array('label'=>'Novo Cadastro', 'url'=>array('create')),
    );
}
?>

<h1>Munícipe #<?php echo $model->solicitante_nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'solicitantes_id',
		'solicitante_nome',
		'solicitante_telefone',
		'solicitante_celular',
		'solicitante_cpf_cnpj',
		'solicitante_endereco',
		'solicitante_numero',
		'solicitante_bairro',
		'solicitante_email',
		'solicitante_data_nascimento',
		'solicitante_rg',
		'solicitante_titulo_eleitor',
	),
        'htmlOptions' => array('class' => 'table table-responsive'),
)); ?>
