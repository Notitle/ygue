<?php 
$this->set('title_for_layout','bienvenue dans la boutique')?>



<?php foreach($sliders as $s): $s=$s['Slider'] ?> 

<div>
    <?php echo $s['link'] ?><br/>
    <?php echo $s['title'] ?>
</div>

<?php endforeach; ?>
