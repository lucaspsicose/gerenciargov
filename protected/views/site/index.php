    <?php unset(Yii::app()->session['active_secretarias_id']); ?>
    <!--container start-->
    <div class="white-bg">

        <!-- career -->
    <?php if (Yii::app()->user->isGuest) : ?>
    <!--<div class="container career-inner">
        <div class="row">
            <div class="col-md-12 career-head">
                <h1 class="wow fadeIn">Pellentesque habitant morbi tristique senectus et netus</h1>

            </div>
            
            
        </div>
       <hr>
        <div class="row">
            <div class="col-md-12 wow fadeIn">
                <p class="align-left">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                </p>
                <p class="align-left">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
            </div>
            <div class="col-md-4 col-md-offset-4 career-contact">
                <p class="text-center wow pulse"><i class="fa fa-envelope pr-10"></i><b>Contact Email : </b><em> human_resource@info.com</em></p>
            </div>
        </div>
        <hr>
        
    <!-- career -->
       </div>
    <?php else : ?>
        <div class="container career-inner">
        <div class="row">
            <div class="col-md-12 career-head">
                <h1 class="wow fadeIn">Secretarias</h1>

            </div>
            
            
        </div>
       <hr>
    
       <div class="row">
           <div class="col-md-12 wow fadeIn">
           <?php 
            foreach (Yii::app()->session['usuario_secretarias'] as $key) {    
                $array = Yii::app()->functions->getDadosSecretarias($key);
                    
                    echo '<div class="feature-box">
                                <div class="col-md-3 col-sm-3 text-center wow fadeInUp">
                                  <div class="feature-box-heading">
                                    <em>
                                    <a href="gg_atendimentos/Admin/?s='.$array['secretarias_id'].'"><img src="'.Yii::app()->request->baseUrl.'/assets/img/gestao_publica.png" alt="" width="100" height="100"></a>

                                    </em>
                                    <h4>
                                      <b>'.$array['secretaria_nome'].'</b>
                                    </h4>
                                  </div>
                                  <p class="text-center">'.
                                   $array['secretaria_secretario']
                                  .'</p>
                                  <p class="text-center">'.
                                   $array['secretaria_email']
                                  .'</p>
                                </div>
                            </div>';
                }
           ?>
               
            </div>
        </div>
        <hr>
    <?php endif; ?>
        
    </div>
    <!--container end-->

     