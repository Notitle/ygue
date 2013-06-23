<?php $this->set('title_for_layout', 'Editer un produit') ?>
<h1>Editer un produit</h1>
<div class='widget'>
    <div class='widget-title'>
        <h3>Modifications</h3>
        <ul>
            <li><?php echo $this->html->link('Retour', array('action' => 'index', 'admin' => true)) ?></li>
        </ul>
    </div>
    <div class='widget-content'>
        
        <?php 
        /**
         * array('type'=>'file' necessaire pour que le formulaire 'sache' qu'il y a une upload de fichier !
         */
        echo $this->Form->create('Product',array('type'=>'file')); ?>
        <?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'Nom'));
		echo $this->Form->input('category_id',array('label'=>'Categorie'));
		echo $this->Form->input('visuel',array('label'=>'Visuel','type'=>'file'));
                echo $this->Form->input('image',array('label'=>'Visuel existant','readonly'=>true));
		echo $this->Form->input('description',array('label'=>'Description'));
		echo $this->Form->input('meta_title',array('label'=>'meta title'));
		echo $this->Form->input('meta_description',array('label'=>'meta description'));
	?>
        <?php echo $this->Form->end('Enregistrer'); ?>
    </div>
</div>