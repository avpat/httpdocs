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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
//CakePlugin::load('Uploader');
//App::import('Vendor', 'Uploader.Uploader');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
		'Session',
		//'Email',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'cars', 'action' => 'index'),
		//	'logoutRedirect' => array('controller' => 'users', 'action' => 'display', 'login'),
			'authorize' => array('Controller'),
			'authenticate' => array(
				'Form' => array(
					'scope' => array('User.active' => 1)
				)
			),
			'authError' => 'You are not authorised to access that location.'
		)
	);
	
	public function beforeFilter() {

		 if($this->action == 'admin_login') {
			$this->redirect('/login');
		}
		$this->Auth->allow('logout');
		
		if(isset($this->request->params['admin'])) {
			$this->layout = 'admin';
		}
	}

	public function isAuthorized($user) {
		$this->Auth->autoRedirect = false; 
		//pr($user);die;
		if(isset($user['role'])) {
			//if(!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin' && $user['role'] == 'admin') {
			if($user['role'] == 'admin') {
				//$this->Auth->loginRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'index');
				return true;
			}
			elseif(!isset($this->request->params['prefix']) && $user['role'] == 'user') {
				//pr("I am here");
				//$this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'splash');
				return true;
			}
		}
		$this->redirect(array('admin' => false, 'controller' => 'cars', 'action' => 'index'));
		return false;
	}
    
}
