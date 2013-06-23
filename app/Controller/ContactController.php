<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactController
 *
 * @author Notitle
 */
class ContactController extends AppController {

    public function index() {
//        echo "<pre>";
//        var_dump($this->request->data['contacts']['email']);
//        die;
//        echo "</pre>";
        if ($this->request->is('post')) {
            App::uses('CakeEmail', 'Network/email');
            $email=new CakeEmail;
            $email->to('Jerome.leboutte@gmail.com')
                     ->bcc($this->request->data['Contact']['email'])
                      ->from($this->request->data['Contact']['email'])
                      ->subject($this->request->data['Contact']['subject'])
                      ->emailFormat('html')
                      ->viewVars($this->request->data['Contact'])
                      ->template('Contact')
                      ->send();
            $this->redirect(array('action'=>'confirmation'));
        }
    }

    public function confirmation() {
        
    }

}

?>
