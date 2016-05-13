<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class bottletype extends Admin_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('crud_auth');
        $this->crud_auth->checkUserManagement();
    }

    public function index(){
		$this->load->model('admin/admin_menu');
		$this->load->add_package_path(APPPATH . 'third_party/scrud/');
		
		$_GET['table'] = 'crud_languages';
		
		$var = array();
		$conf = array();
		$var['main_menu'] = $this->admin_menu->fetch('bottletype');
		
		if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $this->db->database . '/'.$_GET['table'].'.php')) {
			exit;
		}else{
			require __DATABASE_CONFIG_PATH__ . '/' . $this->db->database . '/'.$_GET['table'].'.php';
		}
		
		$hook = Hook::singleton();
		$hook->addFunction('SCRUD_EDIT_FORM', 'edit_form');
		$hook->addFunction('SCRUD_VALIDATE','validate_language_code');
		$hook->addFunction('SCRUD_BEFORE_UPDATE','before_update');
		$hook->addFunction('SCRUD_COMPLETE_SAVE', 'complete_save');
		$hook->addFunction('SCRUD_COMPLETE_DELETE', 'complete_delete');
		
		$conf['theme_path'] = FCPATH . 'application/views/admin/player/templates';
		
		$this->load->library('crud', array('table' => $_GET['table'], 'conf' => $conf));
		$var['main_content'] = $this->load->view('admin/language/index', array('content' => $this->crud->process()), true);
		
		$this->load->model('admin/admin_footer');
		$var['main_footer'] = $this->admin_footer->fetch();
		
		//$this->load->view('layouts/admin/user/default', $var);
		$this->load->view('layouts/admin/default', $var);
	}
}