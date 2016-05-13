<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Playercrl extends Admin_Controller {



	public function __construct() {

        parent::__construct();

        $this->load->model('crud_auth');

        //$this->crud_auth->checkPlayerManagement();

        $this->output->enable_profiler(false);

    }

	public function test()

	{

		

		echo 'test go';

		//return;

		//return;

		//$this->load->model('Player');

		echo 'load model';

		$player=new Player();

		//$player->like("mid",'12','after');

		$player->get();

		echo $player->mid;

		echo 'end';

		return;

		try

		{

			

		}

		catch(exception $ex)

		{

			echo $ex;

		}

	}

	public function player_json(){

		$this->output->enable_profiler(false);

    	$userDao = new ScrudDao('players', $this->db);

    	 

    	if (!isset($_GET['id'])){

    		$params = array();

    		$params['fields'] = array('id','mid','mname','mblood','mtel');

    		$params['conditions'] = array('mid like ?',array("%".$_GET['q']."%"));

    		$rs = $userDao->find($params);

			$player=new player();

		    $player->like("mid",$_GET['q'],'after');

			$player->get();

			$list=array();

			foreach($player as $p)

			{

				$o=new stdClass;

				$o->mid=$p->mid;

				$o->id=$p->id;

				$o->mname=$p->mname;

				$o->mblood=$p->mblood;

				$list[]=$o;

			}

			echo $_GET['callback'].'('.json_encode($list).')';

    		//echo $_GET['callback'].'('.json_encode($rs).')';

    	}else{

    		$var = array();

    		$player=new Player();

			$player->get_by_id($_GET['id']);

			if ($player->id)

			{

				$r=array();

				$r['id']=$player->id;

				$r['mname']=$player->mname;

				$r['mid']=$player->mid;

				$r['mblood']=$player->mblood;

				$r['mtel']=$player->mtel;

				$var['player'] = $r;

				$this->load->view('admin/player/player_prop', $var);

				return;

			}

			else 

			{

				$r=array();

				$r['id']=0;

				$r['mname']='';

				$r['mid']='';

				$r['mblood']='';

				$r['mtel']='';

				$var['player'] = $r;

				$this->load->view('admin/player/player_prop', $var);

				return;	

			}

			return;

				

	    	$this->db->select('*');

        	$this->db->from('players');

        	$query = $this->db->get();

        	$var['coms'] = $query->result_array();

    

    		$params = array();

    		$params['fields'] = array('id','mid','mname','mblood','mtel');

    		$params['conditions'] = array('id = ?',array($_GET['id']));

    		

    		$rs = $userDao->findFirst($params);

    		$var['player'] = $rs;

			print_r($rs);

    		$this->load->view('admin/player/player_prop', $var);

    	}

    }

	public function reg()

	{

		$this->load->add_package_path(APPPATH . 'third_party/scrud/');

		

		$this->load->model('admin/admin_menu');

			

        $var = array();

        $conf = array();

        $var['main_menu'] = $this->admin_menu->fetch('user');



		$conf['theme_path'] = FCPATH . 'application/views/admin/player/templates';

		//$this->load->library('crud', array('table' => 'playerregs', 'conf' => $conf));

		

		$var['cargroups']=array();

		$cargroup=new Cargroup();

		$cargroup->order_by('sort');

		$cargroup->get();

		foreach($cargroup as $item)

		{

			$o=new stdClass;

			$o->id=$item->id;

			$o->name=$item->name;

			$o->sort=$item->sort;

			$var['cargroups'][]=$o;

		}

		$cgp=new stdClass;
		$cgp->id="1";
		$cgp->name="testgroup1";
		$cgp->sort=1;
		$var['cargroups'][]=$cgp;
		

		$var['teams']=array();

		$team=new Team();

		$team->get();

		foreach($team as $item)

		{

			$o=new stdClass;

			$o->id=$item->id;

			$o->name=$item->name;

			$var['teams'][]=$o;

		}

		

		$var['main_content'] =$this->load->view('admin/player/reg', $var, true);	

		//echo $var['main_content'];

		//return;

		$this->load->model('admin/admin_footer');

        $var['main_footer'] = $this->admin_footer->fetch();



        //$this->load->view('layouts/admin/user/default', $var);
        $this->load->view('layouts/admin/default', $var);

	}

	

	public function index()

	{

		

		echo 'yes , it is index';

		return;

			

        

	}





}

?>