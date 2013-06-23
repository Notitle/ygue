<?php $p = $Product['Product'] ?>

<div class="content-center">
    <article id="product-details">
        <div class='right'>
            <header>
                <p class='title'><?php echo $p['name'] ?></p>
            </header>
            <div class='description'>
                <?php echo $p['description'] ?>
            </div> 

            <?php echo $this->form->create('Order', array('id' => 'buy', 'url' => array('controller' => 'carts', 'action' => 'addProduct'))) ?>

            <?php echo $this->form->input('Product.name', array('type' => 'hidden', 'value' => $p['name'])) ?>
            <?php echo $this->form->input('Product.id', array('type' => 'hidden', 'value' => $p['id'])) ?>

            <?php echo $this->form->end('Ajouter au panier') ?>
            <div class='social'>
                <a class='fb' href='http://www.facebook.com/share.php?u=<?php echo $this->html->url($p['link'], true); ?>#&t=Tutoriel photo sur Photocourtoy.be' title='partager sur facebook'>
                    face
                </a>    
            </div>
        </div>


        <div class='left'>
            <a href="<?php echo $this->html->url('/uploads/products/' . $p['image']) ?>" rel='lightbox'>
                <?php echo $this->html->image(sprintf($p['image_path'], 260, 400), array('alt' => $p['name'])) ?>
            </a>
        </div>


    </article>
</div>