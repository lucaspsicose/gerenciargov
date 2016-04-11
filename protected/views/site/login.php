<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="login-bg">
        <div class="container">
            <div class="form-wrapper">
            <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                    ),
                    'htmlOptions'=>array(
                    'class'=>'form-signin wow fadeInUp',
    ),
            )); ?>
                
        <h2 class="form-signin-heading"><?php echo Yii::t('default', 'Fazer Login'); ?></h2>
	<div class="login-wrap">
		<?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder'=>'Usuário')); ?>
		<?php echo $form->error($model,'username'); ?>
	
		<?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder'=>'Senha')); ?>
		<?php echo $form->error($model,'password'); ?>

                <label class="checkbox">
                <?php echo $form->label($model, 'rememberMe'); ?>
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
                </label>  
                <div style="color: #c7254e; display: <?php echo isset($model->msg); ?>">
                    <?php echo $model->msg; ?>
                </div>
	
		<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-lg btn-login btn-block')); ?>
	</div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
