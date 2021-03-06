<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $title_for_layout ?></title>
        <?php if (isset($meta_description)): ?>
            <meta name="description" content="<?php echo $meta_description ?>" />
        <?php endif; ?>
        <?php // echo $this->Html->css("unique") ?>
        <?php echo $this->html->css("nivo-slider") ?>
        <?php echo $this->Html->css("nico") ?>
        <?php echo $this->Html->script('jquery'); ?>
        <?php echo $this->Html->script('fritata'); ?>
        <?php echo $this->Html->script('jquery.nivo.slider'); ?>
        <?php echo $this->Html->script('jquery.nivo.slider.pack'); ?>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-38239022-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>    
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="separation-h2"> </div>
                <div class="separation-h"> </div>
                <?php echo $this->html->link('', '/', array('class' => 'logo', 'title' => 'Photo Courtoy')); ?>

                <div id="slider" class="nivoSlider">

                    <?php echo $this->html->image('h-rond-1.jpg', array('alt' => 'fd', 'escape' => false)) ?>
                    <?php echo $this->html->image('h-rond-2.jpg', array('alt' => 'dfg', 'escape' => false)) ?>
                    <?php echo $this->html->image('h-rond-3.jpg', array('alt' => 'dsf', 'escape' => false)) ?>
                    <?php echo $this->html->image('h-rond-4.jpg', array('alt' => 'dfg', 'escape' => false)) ?>
                    <?php echo $this->html->image('h-rond-5.jpg', array('alt' => 'dg', 'escape' => false)) ?>
                </div>

                <script type="text/javascript">
                    $(window).load(function() {
                        $('#slider').nivoSlider({
                            effect: 'boxRainGrow', // Specify sets like: 'fold,fade,sliceDown'
                            pauseTime: 3000, // How long each slide will show

                            directionNavHide: false, // Only show on hover
                            prevText: '', // Prev directionNav text
                            nextText: '', // Next directionNav text



                        });
                    });
                </script> 

                <div class="menu">
                    <?php echo $this->element('menu_admin') ?>
                </div>
            </div>

            <!-- CONTENU -->


            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('Auth'); ?>
            <?php echo $content_for_layout ?>



            <!-- /CONTENU -->
        </div>
        <div class="footer">
            Photo Courtoy  -  rue Jean Wilmotte, 15  -  4920 Aywaille  - 04/384.42.04<br/>
        </div> 

    </body> 
</html>
