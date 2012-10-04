<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PdfController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pdf';

	var $uses = array('Page', 'Attachment', 'Pdf', 'Image');

	var $components = array('RequestHandler', 'Upload');
       // public $actsAs = array('Uploader.Attachment');
/**
 * This controller does not use a model
 *
 * @var array
 */

	public function index() {
            
	}
	public function add() {
		$this->Crumb->addCrumb('Add Pdf');
                
		$content = $this->modelMap[$this->params['type']]->findById($this->params['id']);
		$this->_checkEditable($content);
		$this->set('content', $content[ucfirst(Inflector::singularize($this->params['type']))]);
		$this->set('type', $this->params['type']);
		if (!empty($this->data)) {
			$this->data['Pdf']['content_id'] = $this->params['id'];
			$this->data['Pdf']['content_type'] = Inflector::singularize($this->params['type']);
			if ($this->Pdf->saveAll($this->data)) {
				$this->_clearPageCache($this->params['id']);
				$this->Session->setFlash('Your PDF has been uploaded');
				$this->redirect('/admin/'.$this->params['type'].'/view/'.$this->params['id']);
			} else {
				$this->Session->setFlash('There was a problem updating your pdf. ' . @$this->Pdf->validationErrors['file']);
			}
		}
	}
        
	public function pdfmerge() {

	}        
}
?>