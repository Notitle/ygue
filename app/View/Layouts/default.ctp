<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content="text/html; charset='utf-8'">
        <title><?php echo $title_for_layout ?></title>
        <?php echo $this->Html->css("unique") ?>
    </head>
    <body>
        <h3>intro cake</h3>
        <span>ici viendra le code html de base</span><br/>

        <?php echo $this->html->link('votre pannier', array('controller' => 'orders', 'action' => 'index')) ?>
        <br/>

        <?php
        /**
         * faire varier categories avec products selon la demande !
         */
        echo $this->html->link('actu', array('controller' => 'welcomes', 'action' => 'blog'));
        echo "<br/>";
        echo $this->html->link('Gallerie', array('controller' => 'categories', "action" => 'index'))
        ?><br/>

        <form method='post' action='<?php echo $this->html->url(array('controller' => 'products', 'action' => 'search')) ?>'>
            <label for="search">recherche</label>
            <input type="text" name='q' id="search" value='' placeholder='Mot(s) clé(s)'  />
        </form>
        <br/><br/> 
        <!-- CONTENU -->

        <?php echo $content_for_layout ?>


        <!-- /CONTENU -->
        <br/><br/>
        <?php
        /**
         * premier parametre-> le nom
         * second -> la destination 
         * troisieme -> tableau de propr qui récupere la classe, le titre 
         * et un escape pour transformer le code en entité html !!! pratique, mildiou
         * (true pour lien -> false pour image pour un affichage correcte)
         */
        echo $this->html->link('Contact', array('controller' => 'contacts', 'action' => 'index'), array('title' => 'Contactez-nous'));
        echo "<br/>";
        echo $this->Html->link($title_for_layout, '/', array('title' => 'accueil', 'class' => 'osef', 'escape' => true));
        ?>
    </body> 
</html>