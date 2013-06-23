<?php $this->set('title_for_layout', 'Gestion des utilisateurs') ?>
<h1>Gestion des utilisateurs</h1>
<div class='widget'>
    <div class='widget-title'>
        <h3>Modifications</h3>
        <ul>
            <li>
                <?php
                echo $this->html->link(
                        'Ajouter ', array('action' => 'add', 'admin' => true))
                ?>
            </li>
        </ul>
    </div>
    <div class='widget-content'>
        <table>
            <thead>
                <tr>
                    <th class='id'>ID</th>
                    <th>Role</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>E-mail</th>   
                    <th>Date de Naissance</th>
                    <th>Prenom de facturation</th>
                    <th>Nom de facturation</th>
                    <th>Adresse de facturation</th>
                    <th>Code postal de facturation</th>
                    <th>Ville de facturation</th>
                    <th class='action'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): $u = $u['User'] ?>
                    <tr>
                        <td class='centered'><?php echo h($u['id']); ?></td>
                        <td><?php echo h($u['role']); ?></td>
                        <td><?php echo h($u['firstname']); ?></td>
                        <td><?php echo h($u['lastname']); ?></td>
                        <td><?php echo h($u['email']); ?></td>
                        <td><?php echo h($u['date_birth']); ?></td>
                        <td><?php echo h($u['billing_firstname']); ?></td>
                        <td><?php echo h($u['billing_lastname']); ?></td>
                        <td><?php echo h($u['billing_address']); ?></td>
                        <td><?php echo h($u['billing_zipcode']); ?></td>
                        <td><?php echo h($u['billing_city']); ?></td>
                        <td>
                            <?php echo $this->Html->link($this->html->image('edit.gif'), array('action' => 'edit', $u['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink($this->html->image('delete.gif'), array('action' => 'delete', $u['id']), array('escape' => false), 'Etes vous sur de vouloir supprimer '.$u['lastname'].' '.$u['firstname'].' ?'); ?>
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