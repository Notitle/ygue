<?php
App::uses('AppController', 'Controller');
/**
 * Sliders Controller
 *
 * @property Slider $Slider
 */
class SlidersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Slider->recursive = 0;
		$this->set('sliders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('Invalid slider'));
		}
		$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
		$this->set('slider', $this->Slider->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Slider->create();
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The slider has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'));
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
		if (!$this->Slider->exists($id)) {
			throw new NotFoundException(__('Invalid slider'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Slider->save($this->request->data)) {
				$this->Session->setFlash(__('The slider has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slider.' . $this->Slider->primaryKey => $id));
			$this->request->data = $this->Slider->find('first', $options);
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
		$this->Slider->id = $id;
		if (!$this->Slider->exists()) {
			throw new NotFoundException(__('Invalid slider'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Slider->delete()) {
			$this->Session->setFlash(__('Slider deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Slider was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
