 
<?php



class CarsController extends AppController {

	//public $components = array('Email');

	// public function beforeFilter() {
	// 	parent::beforeFilter();
	// 	$this->Auth->allow('forgot_password', 'reset_password');
	// }
	public function index() {
		$this->Car->recursive = 0;
		$this->set('cars', $this->paginate());
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->Car->create();
			if ($this->Car->save($this->request->data)) {
				$this->Session->setFlash(__('The Car datails have been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Car details could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		$this->Car->id = $id;
		if (!$this->Car->exists()) {
			throw new NotFoundException(__('Invalid Car details'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Car->save($this->request->data)) {
				$this->Session->setFlash(__('The Car details have been saved'));
				$this->redirect(array('action' => 'view', $this->data['Car']['id']));
			} else {
				$this->Session->setFlash(__('The Car Details could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Car->read(null, $id);
		}
		$this->set('cars', $this->Car->find('list'));		
	}

	public function view($id = null) {
		$this->Car->recursive = 0;
		$cars = $this->Car->find('all');
		$this->set('cars', $this->paginate());
	}

	public function delete($id = null) {
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->Car->id = $id;
		if (!$this->Car->exists()) {
			throw new NotFoundException(__('Invalid Slide'));
		}
		if ($this->Car->delete()) {
			$this->Session->setFlash(__('Car details deleted'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Car Details are not deleted'));
		$this->redirect($this->referer());
	}	

}

?>