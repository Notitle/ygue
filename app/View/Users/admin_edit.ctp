<?php $this->set('title_for_layout', 'Editer des utilisateurs') ?>
<h1>Editer des utilisateurs</h1>
<?php echo $this->Form->create('User'); ?>
<div class='widget'>
    <div class='widget-title'>
        <h3>Infos de base</h3>
        <ul>
            <li><?php echo $this->html->link('Retour', array('action' => 'index', 'admin' => true)) ?></li>
        </ul>
    </div>
    <div class='widget-content'>

        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('role',array('type'=>'hidden','value'=>'customer'));
        echo $this->Form->input('firstname', array('label' => 'Prenom'));
        echo $this->Form->input('lastname', array('label' => 'Nom'));
        echo $this->Form->input('email', array('label' => 'E-mail'));
        echo $this->Form->input('date_birth', array('label' => 'Date de Naissance', 'type' => 'text'));
        
        ?>
        <div class='submit'>
            <input type='submit' value='Enregistrer'/>
        </div>
    </div>
</div>
<div class='widget'>
    <div class='widget-title'>
        <h3>Infos de facturation</h3>
    </div>
    <div class='widget-content'>
        <?php
        echo $this->Form->input('billing_firstname', array('label' => 'Prenom de facturation'));
        echo $this->Form->input('billing_lastname', array('label' => 'Nom de facturation'));
        echo $this->Form->input('billing_address', array('label' => 'Adresse de facturation'));
        echo $this->Form->input('billing_zipcode', array('label' => 'Code postal de facturation'));
        echo $this->Form->input('billing_city', array('label' => 'Ville de facturation'));
        ?>
        <div class='submit'>
            <input type='submit' value='Enregistrer'/>
        </div>
    </div>
</div> 
<?php echo $this->Form->end(); ?>