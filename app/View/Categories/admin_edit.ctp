<?php $this->set('title_for_layout', 'Editer une catégorie') ?>
<h1>Editer une catégorie</h1>
<div class='widget'>
    <div class='widget-title'>
        <h3>Informations</h3>
        <ul>
            <li><?php echo $this->html->link('Retour',array('action'=>'index','admin'=>true))?></li>
        </ul>
    </div>
    <div class='widget-content'>
        <?php echo $this->Form->create('Category'); ?>
        <?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'nom'));
		echo $this->Form->input('meta_title',array('label'=>'meta title'));
		echo $this->Form->input('meta_description',array('label'=>'meta description'));
	?>
        <?php echo $this->Form->end('Enregistrer'); ?>

    </div>
</div>