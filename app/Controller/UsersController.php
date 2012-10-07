<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

	//public $components = array('Email');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('forgot_password', 'reset_password');
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
			
				if($this->Auth->user('role') == 'admin') {
					$this->redirect(array('admin' => true, 'controller' => 'users', 'action' => 'admin_index'));
				} else {
					$this->redirect(array('controller' => 'pages', 'action' => 'index'));
				}
				//$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function forgot_password() {
		$status = 'show form';
		if(!empty($this->request->data)) {
			$user = $this->User->findByUsername($this->request->data['User']['username']);
			if(!empty($user)) {
				$this->User->id = $user['User']['id'];
				$this->request->data['User']['hash'] = sha1($user['User']['username'].uniqid());
				$this->User->saveField('hash', $this->request->data['User']['hash']);
				if($this->sendEmail($this->request->data, 'Reset password', 'reset_password')) {
					$status = 'sent';
				}
			} else {
				$status = 'error';
			}
		}
		$this->set(compact('status'));
	}
	
	public function reset_password() {
		$status = 'show form';
		if(isset($this->request->params['hash'])) {
			$user = $this->User->findByHash($this->request->params['hash']);
			if(empty($user)) {
				$status = 'error';
			}
		} else {
			$this->redirect(array('action' => 'login'));
		}
		if(!empty($this->request->data)) {
			if($this->request->data['User']['password'] === $this->request->data['User']['confirm_password']) {
				$this->User->id = $user['User']['id'];
				if($this->User->save($this->data)) {
					$status = 'reset';
					$this->redirect(array('action' => 'login'));
					$this->Session->setFlash(__('Your password has been reset'));					
				}
			}  else {
				$status = 'mismatch';
			}
		}
		$this->set(compact('status'));

	}
/* 
	public function reset_password() {
		$status = 'show form';
		if(isset($this->request->params['hash'])) {
			$user = $this->User->findByHash($this->request->params['hash']);
			if(empty($user)) {
				$status = 'error';
			}
		} else {
			$this->redirect(array('action' => 'login'));
		}
		if(!empty($this->request->data)) {
			if($this->request->data['User']['password'] === $this->request->data['User']['confirm_password']) {
				// required for login
				$data = array_merge($user['User'], $this->request->data['User']);
				// process form data before save
				$this->request->data['User']['id'] = $user['User']['id'];
				$this->request->data['User']['hash'] = null;
				if($this->User->save($this->request->data)) {
					$this->Auth->login($data);
					//$this->redirect('/');
					//redirect according to user type
					if($this->Auth->user('role') == 'admin') {
						$this->redirect(array('admin' => true, 'controller' => 'users', 'action' => 'index'));
					} else {
						$this->redirect(array('controller' => 'pages', 'action' => 'splash'));
					}					
				}
			}  else {
				$status = 'mismatch';
			}
		}
		$this->set(compact('status'));
	}
 */	
 	private function sendEmail($data, $subject, $template) {
		$email = new CakeEmail('default');
		try {
			return $email->template($template)
				->emailFormat('text')
				->subject($subject)
				->viewVars(array('hash' => $data['User']['hash']))
				->from(array('noreply@sanofi.com' => 'SANOFI DIABETES'))
				->to($data['User']['username'])
				->send();
		} catch(Exception $e) {
			$this->log($e->getMessage());
		}
 	}
	
	public function admin_index() {
		$this->User->recursive = 0;
		$this->paginate = array(
			'conditions' => array('id <>' => 1)
		);
		$this->set('users', $this->paginate());
	}
	
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}
	
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
	}
	
	public function admin_delete($id = null) {
		if (!$this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}