<?php $session = Yii::app()->session; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/favicon.png">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/theme.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/flexslider.css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/magnific-popup.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/jquery-ui-custom.css">


      <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <header class="head-section">
      <div class="navbar navbar-default navbar-static-top container">
          <div class="navbar-header">
              <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse"
              type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
                  <span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/D-large1.png" height="100px"/></a>
          </div>

          <div class="navbar-collapse collapse">
                  <?php $this->widget('zii.widgets.CMenu',array(
                        'firstItemCssClass'=>'dropdown',
                        'htmlOptions' => array(
                                   'class'=>'nav navbar-nav',
                                   ),
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index'), 'itemCssClass'=>'dropdown', 'linkOptions'=> array(
                                            'class' => 'dropdown-toggle'
                                             ),),
                                array('label'=>'Atendimentos', 'url'=>array('/gg_atendimentos/Admin'), 'visible'=>(isset($session['active_secretarias_id']) && in_array($session['perfil'], array(1, 2, 3)))),             
                                array('label'=>'Usuários', 'url'=>array('/gg_usuarios/Admin'), 'visible'=>(in_array($session['perfil'], array(1, 2)))),             
                                array('label'=>'Secretarias', 'url'=>array('/gg_secretarias/Admin'), 'visible'=>in_array($session['perfil'], array(1))),
				array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Sair', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
                  
          </div>
      </div>
    </header>
    <!--header end-->
    <script type="text/javascript">
      
    </script>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1><?php if (!isset($session['active_secretarias_id'])) { echo $this->pageTitle;} else { echo $session['active_secretaria_nome']; } ?></h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <div class="pull-right">
                    	<?php if (Yii::app()->user->isGuest == '') : ?>
                            Você está Logado como <?php $session = Yii::app()->session; echo $session['usuario']; //Yii::app()->user->name; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="white-bg">

        <!-- career -->
    <!--<div class="container career-inner">-->
        <div class="row">
            
            <?php echo $content; ?>
            
        </div>
        
    <!-- career -->
       </div>
    <!--</div>-->
    <!--container end-->

     <!--footer start-->
     <footer class="footer">
        <div class="container">
            <div class="row">
               

            </div>

        </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pull-right">
                    
                </div>
                <div class="col-md-4">
                  <div class="copyright">
                      <p>&copy; Copyright - <?php echo Yii::app()->name ?></p>
                  </div>
                </div>
            </div>
        </div>
    </footer>
     <!--small footer end-->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/hover-dropdown.js"></script>
    <script defer src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/assets/bxslider/jquery.bxslider.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/link-hover.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/gerenciargov.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-ui.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-ui-custom.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery.maskedinput.min.js"></script>


     <!--common script for all pages-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/common-scripts.js"></script>


    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/wow.min.js"></script>
    <script>
        wow = new WOW(
          {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0          // default
          }
        );
        wow.init();
    </script>

</body>
</html>
