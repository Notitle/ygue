<ul>
    <li>
        <?php echo $this->html->link('Ventes', array('controller' => 'orders', 'action' => 'index', 'admin' => true)) ?>
    </li>
    <li>
        <?php echo $this->html->link('Produits', array('controller' => 'products', 'action' => 'index', 'admin' => true)) ?>
    </li>
    <li>
        <?php echo $this->html->link('Categories', array('controller' => 'categories', 'action' => 'index', 'admin' => true)) ?>
    </li>
    <li>
        <?php echo $this->html->link('Clients', array('controller' => 'users', 'action' => 'index', 'admin' => true)) ?>
    </li>

</ul>