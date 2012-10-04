
<?php

class Car extends AppModel {

	public $name = 'Car';
	

	
	public $validate = array(
		'make' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A make is required'
		    )
		),
		'model' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'Car Model is required'
		    )
		),
		'fuletype' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A Fuel type is required'
		    )
		),
		'price' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A price is required'
		    )
		),
		'age' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A Age is required'
		    )
		),
		'mileage' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A mileage is required'
		    )
		),
		'sellerid' => array(
		    'required' => array(
		        'rule' => array('notEmpty'),
		        'message' => 'A sellerid is required'
		    )
		)												
	);

}

?>
