<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class testajaxcall extends CI_Controller {

	public function index() {

		$var =array();
		$this->load->view('testajaxcall', $var);

	}



}

?>