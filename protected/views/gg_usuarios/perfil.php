<?php

$this->setPageTitle('Editar Cadastro');
?>

<h1>Perfil <?php echo $model->usuario_nome; ?></h1>

<?php echo $this->renderPartial('_formPerfil', array('model'=>$model)); ?>

