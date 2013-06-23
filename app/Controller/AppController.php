<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * appellée quand le controller est instantiée
     */
    public function beforeFilter() {

        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
        }
    }

    /**
     * appellée avant le rendu, une fois que l'action d'un controller est executée mais avant que la vue ne soirt affichée
     */
    public function beforeRender() {
        if ($this->layout == 'admin') {
            if (!$this->Session->check('Cart')) {
                $cart = array();
            } else {
                $cart = $this->Session->read('Cart');
            }
            $this->set('cart_for_layout',$cart);
        }
    }

}
