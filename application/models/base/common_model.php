<?php

class common_model extends DataMapper
{

	//$gp;
	var $table = 'common';

	// function __construct($id = NULL)
	// {

	// 	parent::__construct($id);

 //    }
	

	public function getlist()
	{
		//$this->gp="default";
		$list=array();
		
		$list[]=array(
			"gp"=>$this->gp,
			"id"=>1
		);
		$list[]=array(
			"gp"=>$this->gp,
			"id"=>2
		);

		return $list;
	}

	// public function get($id)
	// {

	// }
}


?>