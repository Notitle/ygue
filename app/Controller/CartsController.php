<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CartsController
 *
 * @author Notitle
 */
class CartsController extends AppController {

    public function addProduct() {

        if (!$this->request->is('post')) {
            $this->redirect('/');
        }
        if (!$this->Session->check('Cart')) {
            $cart = array();
        } else {
            $cart = $this->Session->read('Cart');
        }

        $cartKey = $this->request->data['Product']['id'] . '-' . $this->request->data['Product']['name'];

        $this->loadModel('Product');
        $this->Product->id = $this->request->data['Product']['id'];

        if ($this->Product->exists()) {

            if (!array_key_exists($cartKey, $cart)) {
                $p=$this->product->find('first',array(
                    'fields'=>array('Product.price')
                    //////////////////////////////////////////////////
                    //AJOUTER PRIX BD
                    //////////////////////////////////////////////////
                ));
                $cart[$cartKey] = array(
                    'product_id' => $this->request->data['Product']['id'],
                    'name' => $this->request->data['Product']['name'],
                    'qte' => 1
                );
            } else {
                $cart[$cartKey]['qte']++;
            }
            $this->Session->write('Cart', $cart);
        }
                echo "<pre>";
        var_dump($cart);
        die;
        echo"</pre>";

        $this->redirect($this->referer());
    }

}

?>
