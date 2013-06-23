
<?php echo $this->html->link('Ventes', array('controller' => 'orders', 'action' => 'index', 'admin' => true), array('class' => 'btn_menu')) ?>
<div class="separation-menu"> </div>
<?php echo $this->html->link('Produits', array('controller' => 'products', 'action' => 'index', 'admin' => true), array('class' => 'btn_menu')) ?>
<div class="separation-menu"> </div>
<?php echo $this->html->link('Categories', array('controller' => 'categories', 'action' => 'index', 'admin' => true), array('class' => 'btn_menu')) ?>
<div class="separation-menu"> </div>
<?php echo $this->html->link('Clients', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'btn_menu')) ?>
<div class="separation-menu"> </div>
<?php echo $this->html->link('admin', "/admin", array('class' => 'btn_menu')) ?>
<div class="separation-menu"> </div>
<?php echo $this->html->link('Log Out', array('controller' => 'logout', 'admin' => false), array('class' => 'btn_menu')) ?>
