<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class test extends CI_Controller {

	public function __construct() {
        //parent::__construct();
		//$this->output->enable_profiler(true);
    }
   
	function index()
	{
		echo 'test';
		
		/*
		$this->load->model('crud_auth');
        $this->load->model('admin/admin_menu');

        $var = array();
        
        $var['main_menu'] = $this->admin_menu->fetch();
        $var['main_content'] = $this->load->view('admin/common/dashboard',$var,true);
        
        $this->load->model('admin/admin_footer');
        $var['main_footer'] = $this->admin_footer->fetch();

        $t	his->load->view('layouts/admin/default', $var);
		*/
	}		
		
}		
?>
	