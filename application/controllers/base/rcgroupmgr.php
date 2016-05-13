<?php 

class rcgroupmgr extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
		
		$this->config->load('scrud');
		$this->output->enable_profiler(true);
    }
    
	public function lista()
	{
		$m=new Menugroup();
		$m->get();
		foreach($m as $mi)
		{
			echo $mi->name;
			echo '</br>';
		}
	}
	
	public function index()
	{
		$var = array();
		
        //$this->load->model('admin/admin_menu');
		//$var['main_menu'] = $this->admin_menu->fetch('user');
		
		$var['main_menu'] = $this->load->view('base/menu/menu',$var,true);
		
		$tabs=array();
		$tabs[]=array(
			'title'=>'組別',
			'active'=>true
		);
		$tabs[]=array(
			'title'=>'車隊'
		);
		$tabs[]=array(
			'title'=>'選手'
		);
		
		$var['tabs']=$tabs;
		
		//$var['main_content'] = $this->load->view('admin/user/user', array('content' => $this->crud->process()), true);
        
		//$this->load->model('admin/admin_footer');
		//$var['main_footer'] = $this->admin_footer->fetch();
		
		$m=new rcgroup();
		$m->get();
		$list=array();
		$fields=array('name');
		foreach($m as $mi)
		{
			$o=new stdClass;
			$o->id=$mi->id;
			$o->name=$mi->name;
			$list[]=$o;
		}
		$var['fields']=$fields;
		$var['dataset']=$list;
		$var['title']="組別";
		
		$this->load->view('layouts/base/browse', $var);
	}
	
	
}




?>