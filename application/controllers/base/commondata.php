<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commondata extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('base/common_model','commondata');
		//$this->output->enable_profiler(true);
		$this->commondata->gp="abc";
	}


	public function encodea()
	{
		
		
		//$key="abc";

		$myVarIWantToEncodeAndDecode="ha1414";

		$encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $myVarIWantToEncodeAndDecode, MCRYPT_MODE_CBC, md5(md5($key))));

		echo $encoded.'</br>';

		$decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encoded), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

		echo $decoded;

	}


	//http://stackoverflow.com/questions/15884248/how-to-create-two-way-encode-decode-methods-using-use-specific-key-php
	public function encodeStr($str)
	{
		$key = 'p@ssw0rd';
		$encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $str, MCRYPT_MODE_CBC, md5(md5($key))));
		echo $encoded;
		return $encoded;
	}

	public function decodeStr($str)
	{
		$str="c5xrVWUYiXLUORcWizNwcgNWFrRnGsLk2qyeDqQVI+M=";
		$key = 'p@ssw0rd';
		$decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($str), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		echo $decoded;
		return $decoded;
	}


	public function crypt()
	{
		//$this->load->library('crypt/Bcrypt');
		//$Bcrypt=new Bcrypt();
		$options = [
    		'cost' => 12,
		];
		
		$hasha= password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);

		echo $hasha."\n\r</br>";

		$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

		if (password_verify('rasmuslerdorf', $hasha)) {
		    echo 'Password is valid!';
		} else {
		    echo 'Invalid password.';
		}

	}

	public function index()
	{
		 $r=$this->commondata->get();
		 
		 $list=array();
		 foreach ($r as $key => $value) {
		 	//print $key.'.';
		 	//print $value->code.'</br>';
		 	$obj=new stdClass;
		 	$obj->code=$value->code;
	 		$list[]=$obj;
		 }
		 
		 $var['list']=$list;

		 $this->load->view('admin/commondata',$var);
	}

	public function _is_unique2($input) {
	    

	    $exclude_id = $this->input->post('code');

	    $dt=new common_model();
	    $dt->where('gp','default')->where('code',$exclude_id);
        $dt->get();
        if ($dt->exists())
    	{
    		$this->form_validation->set_message('_is_unique2', 'code exists');
	        return FALSE;
    	}

	    //if( $this->db->where('code', $input)->limit(1)->get('common')->num_rows())
	    if ($input=="a")    
	    {
	        $this->form_validation->set_message('_is_unique2', 'code exists');
	        return FALSE;
	    }

	    return TRUE;
	}


	public function create()
	{

		$data['code'] = '';
		$data['nm'] = '';

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('nm', 'name', 'trim|required');
		$this->form_validation->set_rules('code', 'code', 'trim|required|is_unique');
		$this->form_validation->set_rules('code', 'code', 'callback__is_unique2');

		//echo $this->form_validation->run();
		if ($this->form_validation->run() === true)
		{

			$code=$this->input->post("code");
			echo $code."</br>";

			echo $this->encodeStr($code).'</br>';
			echo $this->decodeStr($this->encodeStr($code)).'</br>';

			return;

			$dt=new common_model();
			$dt->code=$this->input->post("code");
			$dt->nm=$this->input->post("nm");
			$dt->save();
			//print_r($dt);
			echo 'success';
		  
		}
		else 
		{
			//print_r($data);
			$this->load->vars($data);
			$this->load->view("common-form");	
		}
	}

	public function create_()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		//$data['nm'] = '';
		//$data['gp'] = '';
		//$data['code'] = '';
		
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('nm', 'name', 'required');
		$this->form_validation->set_rules('code', 'code', 'required');

		echo $this->form_validation->run();
		if ($this->form_validation->run() === false)
		{
			//echo 'create fail';
			$this->load->view("common-form");
			exit;
		}



		return;

		
			
		//$this->load->vars($data);


	}
}

?>