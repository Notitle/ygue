<?php

class WelcomesController extends AppController {

    //une fonction se refere a une vue
    var $uses = null;

    function index() {
        $this->loadModel('Slider');
        $this->loadModel('Product');

        $sliders = $this->Slider->find('all', array(
            'fields' => array('link', 'title', 'subtitle', 'image'),
            'order' => array('Slider.position')
        ));

//        echo '<pre>';
//        var_dump($sliders); die;
//        echo '</pre>';

        $products = $this->Product->find('all', array(
            'fields' => array('id', 'name', 'image'),
            'order' => array('Product.created' => 'DESC'),
            'limit' => 4
        ));
        
        /**
         * passage a la vue, on peut aussi le mettre via un tableau
         */
        $this->set('sliders',$sliders);
        $this->set('product',$products);
        
//        $this->set(compact('sliders','product')) 3ieme methode
//        
//        echo '<pre>';
//        var_dump($sliders); die;
//        echo '</pre>';
    }

    public function blog() {
        
    }

}

?>
