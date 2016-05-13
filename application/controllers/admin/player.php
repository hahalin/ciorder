<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class player extends Admin_Controller {
//class player extends CI_Controller {

	public function __construct() {

        parent::__construct();


        //$this->crud_auth->checkPlayerManagement();

        $this->output->enable_profiler(true);

    }


    public function testdatab()
    {
        $this->load->model('players');
        $this->load->model('teams');

        $team=new teams();
        $team->get();
        foreach ($team as $obj)
		{
		    $p = new players();
			$p->where_related_team($obj)->get();
			foreach($p as $po)
			{
				echo $obj->nm.'--'.$po->nm;
				echo '<br/>';
			}
			
		}
    }

    public function testdatac()
    {
        $this->load->model('players');
        $this->load->model('teams');

        $p=new players();
        $p->get();

        foreach ($p as $obj)
		{
		    $t = new teams();
			$t->where_related_player($obj)->get();

			echo $obj->nm.'--'.$t->nm;
			echo '<br/>';
		}
    }


    public function testdata()
    {
        $this->load->model('players');
        $this->load->model('teams');


        $team=new teams();
        $team->where('code','t01');
        $team->get();
        if (!$team->exists())
    	{
    	 	$team->code="t01";
    	 	$team->nm="t01nm";
        	$team->save();
    	}

        

    	$player=new players();
    	$player->where('code',"a01");
    	$player->get();
    	if (!$player->exists())
    	{
    		$player->id="a01";
    		$player->nm="a01nm";
    		$player->save();
    	}
    	$player->save($team);

    	$player->flush_cache();
		$player=new players();
    	$player->where('code',"a02")->get();

    	if ($player->exists())
    	{
    		echo 'exists';
    	}
    	else 
    	{
    		echo 'not exists';
    	}
    	if (!$player->exists())
    	{
    		$player->code="a02";
    		$player->nm="a02nm";
    		$player->save();
    	}
    	$player->save($team);


    	echo 'done';
    	return;
    }

	public function testa()

	{

		

		//echo 'test go';

		return;

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

    		

	    	$this->db->select('*');

        	$this->db->from('players');

        	$query = $this->db->get();

        	$var['coms'] = $query->result_array();

    

    		$params = array();

    		$params['fields'] = array('id','mid','mname','mblood','mtel');

    		$params['conditions'] = array('id = ?',array($_GET['id']));

    		

    		$rs = $userDao->findFirst($params);

    		$var['player'] = $rs;

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



        $this->load->view('layouts/admin/user/default', $var);

	}

	

	public function index()

	{

		

		echo 'yes , it is index';

		return;

			

        

	}





}

?>