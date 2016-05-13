<?php

class test extends  Admin_Controller 

{

	function __construct()

	{

		parent::__construct();

	}

	function load($pagea="",$pageb="")
	{
		//$page=$_GET['page'];
		$pageaa=$pagea;
		echo "output $pagea $pageb some words";
	}

	function insert($code,$nm)
	{
		$data=array(
			'code'=>$code,
			'nm'=>$nm
		);
		$this->db->insert('common',$data);
		$id=$this->db->insert_id();
		echo $id;
	}
}

?>