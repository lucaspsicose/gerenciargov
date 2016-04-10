    <?php unset(Yii::app()->session['active_secretarias_id']); ?>
    <!--container start-->
    <div class="white-bg">

        <!-- career -->
    <?php if (Yii::app()->user->isGuest) : ?>
    <?php SiteController::redirect(Yii::app()->request->baseUrl.'/site/login'); ?>
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

     