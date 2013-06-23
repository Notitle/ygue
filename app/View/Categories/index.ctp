<div class="content-center">
    <div id="products-list">
        <header>
            <p class="counter">
                <?php echo $this->Paginator->counter('<strong>%start%-%end%</strong> sur %count% produits') ?>
            </p>
        </header>
        <div class="products">
            <?php foreach ($Product as $p): $p = $p['Product']; ?>
                <article>
                    <figure><?php echo $this->Html->link($this->Html->image(sprintf($p['image_path'], 200, 200), array('alt' => $p['name'])), $p['link'], array('escape' => false)); ?></figure>
                    <figcaption>
                        <h2>
                            <span class="title"><?php echo $p['name'] ?></span>
                        </h2>
                    </figcaption>
                    <p class="link">
                        <?php echo $this->Html->link('details', $p['link']) ?>
                    </p>
                </article>
            <?php endforeach; ?>
            <div class='clearfix'></div>
        </div>
        <footer>
            <p>page:</p>
            <div class="pagination">
                <?php
                echo $this->Paginator->prev('< ', array('class' => 'prev'), null, array('class' => 'disable'));
                echo $this->Paginator->numbers(array('separator' => false, 'before' => false, 'after' => false));
                echo $this->Paginator->next(' >', array('class' => 'next'), null, array('class' => 'disable'));
                ?>
            </div>
        </footer>
    </div>
    <nav id='filters'>
        <header><p>filtrer par</p></header>
        <ul>
            <li class='current'> 
                <?php echo $this->html->link('Tous', array('action' => 'index')) ?>
            </li>

            <?php foreach ($categories as $c): $c = $c['Category']; ?>
                <li>
                    <?php echo $this->html->link($c['name'], $c['link']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
<div class='clearfix'></div>
