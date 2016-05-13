<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pw extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('mywork/pw_model');
		$this->output->enable_profiler(true);
	}

	public function index()
	{
		$list=$this->pw_model->get();
		foreach ($list as $obj)
		{
		    echo $obj->nm;
		}

	}

}

?>