<?php

class Rcgroup extends DataMapper {

	// Insert related models that Template can have just one of.
	var $has_one = array();

	// Insert related models that Template can have more than one of.
	var $has_many = array(
		
	);

	var $validation = array(
		/*'example' => array(
			// example is required, and cannot be more than 120 characters long.
			'rules' => array('required', 'max_length' => 120),
			'label' => 'Example'
		)*/
	);
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
	
		
	
}
?>