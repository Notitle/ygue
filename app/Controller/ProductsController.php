<?php

App::uses('AppController', 'Controller');

/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

    public function view($slug, $id) {

        $Product = $this->Product->find('first', array(
            'fields' => array('Product.*'),
            'conditions' => array('Product.id' => $id),
            'recursive' => 0
        ));
        
        if($slug!=$Product['Product']['slug']){
            $this->redirect($Product['Product']['link'],301);
        }
        $this->set('title_for_layout',$Product['Product']['meta_title']);
        $this->set('meta_description',$Product['Product']['meta_description']);

 //        echo "<pre>";
//        var_dump($Product,$slug);die;
//        die;
//        echo"</pre>";
        $this->set(compact('Product'));
    }

    /**
     * admin_index method
     * 
     * @return void
     */
    public function admin_index() {
        $this->Product->recursive = 0;
        $this->set('products', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {

        if ($this->request->is('post')) {
            $this->Product->create();
            if (!empty($this->request->data['Product']['visuel']['tmp_name'])) {
                $dir = WWW_ROOT . 'uploads' . DS . 'products';

                $r = move_uploaded_file($this->request->data['Product']['visuel']['tmp_name'], $dir . DS . $this->request->data['Product']['visuel']['name']);
//                echo "<pre>";var_dump($this->request->data['Product']['visuel']['name']);die;echo "</pre>";die;
                $this->request->data['Product']['image'] = $this->request->data['Product']['visuel']['name'];
                unset($this->request->data['Product']['visuel']);
            }
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        }

        $categories = $this->Product->Category->find('list');
        $orders = $this->Product->Order->find('list');
        $this->set(compact('categories', 'orders'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if (!empty($this->request->data['Product']['visuel']['tmp_name'])) {
                $dir = WWW_ROOT . 'uploads' . DS . 'products';

                $r = move_uploaded_file($this->request->data['Product']['visuel']['tmp_name'], $dir . DS . $this->request->data['Product']['visuel']['name']);
//                echo "<pre>";var_dump($this->request->data['Product']['visuel']['name']);die;echo "</pre>";die;
                $this->request->data['Product']['image'] = $this->request->data['Product']['visuel']['name'];
                unset($this->request->data['Product']['visuel']);
            }
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The product has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
        $categories = $this->Product->Category->find('list');
        $orders = $this->Product->Order->find('list');
        $this->set(compact('categories', 'orders'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('Product deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Product was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
