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
class CsvController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Csv';

	var $uses = array('Page', 'Attachment', 'Csv');

	var $components = array('RequestHandler');
       // public $actsAs = array('Uploader.Attachment');
/**
 * This controller does not use a model
 *
 * @var array
 */

	public function index() {
		//include './Vendor/parsecsv/parsecsv.lib.php';
		require_once('../Vendor/parsecsv/parsecsv.lib.php');
		//App::import("Vendor","parsecsv", array("file"=>"parsecsv.lib"));
		$data = $array();
		$filepath = "./files/data.csv";
		//$filepath ="../Vendor/parsecsv/examples/_books.csv";
		$csv = new parseCSV();   
		$data = $csv->auto($filepath);
		// pr($data); 
		//pr($csv->titles);    
		//pr($csv->data);     
		$this->set(compact('data', $data));
		
		//$this->set(compact('file', $data['basename']));
  
	}

}
?>