<?php

class Cargroups extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('form'));

		$this->output->enable_profiler(true);

	}

	

	

	public function edita($id=0)

	{

		

		

		echo $xtype;

	}

	

		

	public function edit($id=0)

	{

		

		$xtype="";

		if ($this->input->get("xtype"))

		{

			$xtype=$this->input->get("xtype");

		}

		

		$data=array();

		$m=new Cargroup();

		$m->get_by_id($id);

		$data['entity']='cargroup';

		$data['title']='修改分組';

		$data['id']=$id;

		$fieldlist=array();

		

		$fds=array(

			'code'=>array('cname'=>'編號'),

			'name'=>array('cname'=>'名稱')

		);

		

				

		foreach($fds as $f=>$fc)

		{

			$o=new stdClass();

			$o->name=$f;

			$o->cname=$fc['cname'];

			if ($m->id >0)

			{

				$o->value=$m->$f;

			}

			$fieldlist[]=$o;

		}

		

		$data['fieldlist']=$fieldlist;

	

		$this->load->view('header');

		

		$this->load->view('base/edit',$data);

		

		$this->load->view('footer_base');		

			

	}

	

	public function index(){

		

		//$this->load->model('admin/admin_menu');

		//$this->load->add_package_path(APPPATH . 'third_party/scrud/');

		//print ("aaa");
		//return;
		//$m=new Rcgroup();
		
		$auth = $this->session->userdata('CRUD_AUTH');


		$m=new Cargroup();
		//$m->id=1;
		$m->code="code1";
		$m->name="name1";
		$m->created_by=intval($auth["id"],10);
		$m->updated_by=intval($auth["id"],10);
		$m->save();
		//$m->get();

		print_r($m);

		return;

		$data=array();

		$list=array();

		foreach ($m as $mi ) {
			$o=new stdClass();

			$o->id=$mi->id;

			$o->code=$mi->code;

			$o->name=$mi->name;

			$list[]=$o;

		}

		$data['list']=$list;

		$data['title']='組別';

		

	    $this->load->view('header');

		

		$this->load->view('base/list',$data);

		

		$this->load->view('footer_base');		

	}

	

}



?>