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
            </div><!-- sidebar -->
        </div>
    </div><!-- content -->
</div>
    
<?php $this->endContent(); ?>