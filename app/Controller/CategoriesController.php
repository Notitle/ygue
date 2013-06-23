<?php

App::uses('AppController', 'Controller');

/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

    public function index() {
        $d = array();
        $d['categories'] = $this->Category->find('all', array(
            'fields' => array('Category.id', 'Category.name'),
            'order' => array('Category.name'),
            'recursive' => -1
        ));

        $this->paginate = array(
            'fields' => array(
                'Product.id',
                'Product.name',
                'Product.image',
                'Product.description'
            ),
            'conditions' => array(),
            'order' => array('Product.created' => 'DESC'),
            'limit' => 8,
            'recursive' => 0
        );

        $d['Product'] = $this->paginate('Product');
//        echo "<pre>";
//        var_dump($d['Product']);
//        die;
//        echo"</pre>"; 
        $this->set($d);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Category->recursive = 0;
        $this->set('categories', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
        $this->set('category', $this->Category->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('Category deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Category was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
