<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="component-bg">
    <div class="container">
        <div class='col-md-9'>
            <?php echo $content; ?>
        </div>
        <div class="col-md-3">
            <div class="blog-side-item">
            <!--<div id="sidebar">-->
                <?php
                        $this->beginWidget('zii.widgets.CPortlet', array(
                                'title'=>'Menu',
                        ));
                ?>        
                <div class="category">        
                <?php      
                        $this->widget('zii.widgets.CMenu', array(
                                'encodeLabel'=>false,
                                'items'=>$this->menu, 
                                'htmlOptions'=>array('class'=>'list-unstyled'),
                        ));
                        $this->endWidget();
                ?>
                </div>
                
                <div class="category">        
                <?php 
                        $chart = Yii::app()->functions->getAtendimentosSecretariasChart();
                        
                        $sec = array();
                        $atendimentos = array();
                        $realizados   = array();
                        
                        foreach ($chart as $value) {
                            array_push($sec, $value['secretaria_nome']);
                            array_push($atendimentos, (integer)$value['REALIZADOS']);
                            array_push($realizados, (integer)$value['FINALIZADOS']);
                        }
                        $this->Widget('ext.highcharts.HighchartsWidget', array(
                                        'options' => array(
                                           'title' => array('text' => 'Antedimentos(Últimos 30 dias)'),
                                           'xAxis' => array(
                                              'categories' => $sec
                                           ),
                                           'yAxis' => array(
                                              'title' => array('text' => 'Atendimentos')
                                           ),
                                           'series' => array(
                                              array('type' => 'bar', 'name' => 'Atendimentos Realizados', 'data' => $atendimentos),
                                              array('type' => 'bar', 'name' => 'Atendimentos Finalizados', 'data' => $realizados)
                                           )
                                        )
                                     ));
                ?>
                </div>
            </div><!-- sidebar -->
        </div>
    </div><!-- content -->
</div>
    
<?php $this->endContent(); ?>