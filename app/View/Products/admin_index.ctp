<?php $this->set('title_for_layout', 'Gestion des produits') ?>
<h1>Gestion des produits</h1>
<div class='widget'>
    <div class='widget-title'>
        <h3></h3>
        <ul>
            <li>
                <?php echo $this->html->link(
                        'Ajouter ',
                        array('action'=>'add','admin'=>true))
                ?>
            </li>
        </ul>
    </div>
    <div class='widget-content'>
        <table>
            <thead>
                <tr>
                    <th class='id'>ID</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th class='action'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $l): $p=$l['Product']; $c=$l['Category'] ?>
                <tr>
                    <td class='centered'><?php echo h($p['id']); ?></td>
                    <td><?php echo h($p['name']); ?></td>
                    <td><?php echo h($c['name']); ?></td>
                    <td>
                        <?php echo $this->Html->link($this->html->image('edit.gif'), array('action' => 'edit', $p['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink($this->html->image('delete.gif'), array('action' => 'delete', $p['id']), array('escape' => false), 'Etes vous sur de vouloir supprimer '.$p['name'].' ?'); ?>
                    </td>
                    
                </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>   
        <div class="pagination">
            <?php
            echo $this->Paginator->prev('< ', array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(' >', array(), null, array('class' => 'next disabled'));
            ?>
        </div>
    </div>
</div>