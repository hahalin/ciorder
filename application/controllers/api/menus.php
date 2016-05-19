<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class menus extends CI_Controller {

	function __construct() {
        parent::__construct();
    	 if (empty($this->session->userdata['CRUD_AUTH']))
		 {
		 	$this->output->set_status_header('401');
            exit();
		 }
	}


	public function getList()
	{
		
		 $this->load->model('crud_auth','model');

		 $dt=$this->session->userdata['last_activity'];
		 $dt=date('Y-m-d H:i:s',$dt);
		 
	
		 $group=$this->session->userdata['CRUD_AUTH']['group'];
		 $list=array();
		 if ($group['group_global_access']==1)
		 {
		 	$list[]="admin/user";
		 	$list[]="admin/group";
		 	$list[]="admin/permission";
		 }
		 if(isset ($_GET['callback']))
		 {
			echo $_GET['callback'].'('.json_encode($list).')'; 	
		 }
		 else 
		 {
		 	echo json_encode($list); 		
		 }
		
		 //print_r($this->session->userdata["CRUD_AUTH"]);
		
	}

}

?>