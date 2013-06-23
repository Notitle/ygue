<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content="text/html; charset='utf-8'">
        <title><?php echo $title_for_layout ?></title>
        <?php echo $this->Html->css("unique") ?>
    </head>
    <body>
        <div id='head'>
        <h3>PARTIE ADMIIIN LAYOUT FTW</h3>
        <span>menu/session shit</span>
        <?php echo $this->html->link('votre pannier', array('controller' => 'orders', 'action' => 'index')) ?>
        <br/>

        <div>
            <?php echo $this->element('menu_admin') ?>
        </div>

        <form method='post' action='<?php echo $this->html->url(array('controller' => 'products', 'action' => 'search')) ?>'>
            <label for="search">recherche</label>
            <input type="text" name='q' id="search" value='' placeholder='Mot(s) clé(s)'  />
        </form>
        <br/><br/> 
        <?php
        echo $this->html->link(
                $this->html->image('admin.png'), "/admin", array('id' => 'logo', 'escape' => false));
        echo $this->html->link(
                $this->html->image('logout.png'), array('controller'=>'logout','admin'=>false), array('id'=>'logo', 'title'=>'me deco','escape'=> false ));
        ?>
        <br/><br/> 
        </div>
        <div id="content" class="content-center">
        <!-- CONTENU -->
        
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('Auth'); ?>
        <?php echo $content_for_layout ?>
        
        <!-- /CONTENU -->
        </div>
        <br/><br/>
        <div id='foot'>
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
echo $this->Html->link("Home", '/', array('title' => 'accueil', 'class' => 'osef', 'escape' => true));
?>
            </div>
    </body> 
</html>