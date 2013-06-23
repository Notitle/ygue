<?php $this->set('title_for_layout', 'gestion des categories ') ?>
<h1>Gestion des catégories</h1>
<div class='widget'>
    <div class='widget-title'>
        <h3>Liste des catégories</h3>
        <ul>
            <li>
                <?php echo $this->html->link(
                        'Ajouter une catégorie',
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
                    <th class='action'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $p): $p=$p['Category']; ?>
                <tr>
                    <td class='centered'><?php echo h($p['id']); ?></td>  
                    <td><?php echo h($p['name']); ?></td>
                    <td>
                        <?php echo $this->Html->link($this->html->image('edit.gif'), array('action' => 'edit', $p['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink($this->html->image('delete.gif'), array('action' => 'delete', $p['id']), array('escape' => false),'Etes vous sur de vouloir supprimer '.$p['name'].' ?'); ?>
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