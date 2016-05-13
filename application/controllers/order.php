<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class order extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('crud_auth');
        $this->crud_auth->checkUserManagement();
    }

    public function index()
    {

        $this->load->model('admin/admin_menu');
        $this->load->add_package_path(APPPATH . 'third_party/scrud/');
        $_GET['table'] = 'orders';
        $var = array();
        $conf = array();
        $var['main_menu'] = $this->admin_menu->fetch('order');

        if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $this->db->database . '/orders.php')) {
            //exit;
        }else{
            //require __DATABASE_CONFIG_PATH__ . '/' . $this->db->database . '/orders.php';
        }
        $conf['frm_type']='2';
        $conf['limit']='10';
        $conf["data_list"]=array(
                'orders.id' =>
                    array (
                            'alias' => 'id',
                            'width' => 40,
                            'align' => 'center',
                            'format' => '',
                    ),
                'orders.orderno' =>
                    array (
                            'alias' => 'orderno',
                            'width' => 50,
                            'align' => 'center',
                    )
                // 'action' =>
                //     array (
                //             'alias' => $this->lang->line('actions'),
                //             'format' => '<a type="button" onclick="__view(\'{ppri}\'); return false;" class="btn btn-mini">'.$this->lang->line('view').'</a> <a type="button" onclick="__edit(\'{ppri}\'); return false;" class="btn btn-mini btn-info">'.$this->lang->line('edit').'</a> <a type="button" onclick="__delete(\'{ppri}\'); return false;" class="btn btn-mini btn-danger">'.$this->lang->line('delete').'</a>',
                //             'width' => 130,
                //             'align' => 'center'
                //     )
            
        );

        $conf["form_elements"]=array(
            // 'orders.id'=>
            //     array(
            //         'alias'=>'id',
            //         'element' =>
            //             array (
            //                     0 => 'text',
            //                     1 =>
            //                     array (
            //                             'style' => 'width:210px;',
            //                     )
            //             )
            //     ),
          
            'orders.orderno'=>
                array(
                    'alias'=>'訂單號碼',
                    'element' =>
                        array (
                                0 => 'text',
                                1 =>
                                array (
                                        'style' => 'width:210px;',
                                )
                        )
                )
        );

        $conf['elements']=array(
            'orders.orderno' =>
                array (
                        'alias' => 'orderno',
                        'element' =>
                        array(
                                0 => 'text',
                                1 =>
                                array (
                                        'style' => 'width:210px;',
                                )
                        )
                )
        );
        
        $hook = Hook::singleton();
        //SCRUD_BEFORE_INSERT
        //SCRUD_BEFORE_SAVE
        //SCRUD_BEFORE_INSERT
        //$hook->addFunction('SCRUD_BEFORE_SAVE', 'getOrderNo');
        $hook->addFunction('SCRUD_BEFORE_INSERT', 'getOrderNo');

        // echo '<pre>';
        // print_r($conf);
        // echo '</pre>';

        $conf['theme_path'] = FCPATH . 'application/views/admin/order/templates';
        $this->load->library('crud', array('table' => 'orders', 'conf' => $conf));
        $var['main_content'] = $this->load->view('admin/order/order', array('content' => $this->crud->process()), true);
        
        $this->load->model('admin/admin_footer');
        $var['main_footer'] = $this->admin_footer->fetch();

        $this->load->view('layouts/admin/default', $var);

    }


    public function form()
    {
        $this->load->add_package_path(APPPATH . 'third_party/scrud/');

        

        $this->load->model('admin/admin_menu');

            

        $var = array();

        $conf = array();

        $var['main_menu'] = $this->admin_menu->fetch('orders');



        $conf['theme_path'] = FCPATH . 'application/views/admin/order/templates';

        //$this->load->library('crud', array('table' => 'playerregs', 'conf' => $conf));

        $var['main_content'] =$this->load->view('admin/order/add', $var, true);    

        //echo $var['main_content'];

        //return;

        $this->load->model('admin/admin_footer');

        $var['main_footer'] = $this->admin_footer->fetch();



        $this->load->view('layouts/admin/default', $var);
    }

    public function test() {

    	$var = array();
    	$conf = array();
    	
    	$form["form"]=array(
    		"orderno"=>"20160325001",
            "timezone"=>timezones('UP8')
    		);

    	$this->load->model('admin/admin_menu');
    	$var['main_menu'] = $this->admin_menu->fetch('order');
    	
    	$conf['theme_path'] = FCPATH . 'application/views/admin/scrud/templates';
        
        //$this->load->library('crud', array('table' => 'crud_users', 'conf' => $conf));
        
        $var['main_content'] =$this->load->view("test",$form,true);
        //$var['main_content'] ="maincontent";
        $this->load->model('admin/admin_footer');
        $var['main_footer'] = $this->admin_footer->fetch();
        $var['js'] = "order.js";

        $this->load->view('layouts/admin/default', $var);
        //$this->load->view('order', $var);

    	return;

        $this->load->model('admin/admin_menu');
        $this->load->add_package_path(APPPATH . 'third_party/scrud/');
        $_GET['table'] = 'crud_users';
        $var = array();
        $conf = array();
        $var['main_menu'] = $this->admin_menu->fetch('user');

        if (!file_exists(__DATABASE_CONFIG_PATH__ . '/' . $this->db->database . '/crud_users.php')) {
            exit;
        }else{
        	require __DATABASE_CONFIG_PATH__ . '/' . $this->db->database . '/crud_users.php';
        }

        $hook = Hook::singleton();

        $hook->addFunction('SCRUD_ADD_FORM', 'addPasswordConfirmElement');
        $hook->addFunction('SCRUD_EDIT_FORM', 'addPasswordConfirmElement');

        $hook->addFunction('SCRUD_BEFORE_VALIDATE', 'passwordConfirmValidate');
        $hook->addFunction('SCRUD_VALIDATE', 'comparePassAndConfirmPass');
        $hook->addFunction('SCRUD_VALIDATE', 'checkUser');

        $hook->addFunction('SCRUD_BEFORE_SAVE', 'encryptPassword');
        
        $conf['theme_path'] = FCPATH . 'application/views/admin/user/templates';
        $this->load->library('crud', array('table' => 'crud_users', 'conf' => $conf));
        $var['main_content'] = $this->load->view('admin/user/user', array('content' => $this->crud->process()), true);
        
        $this->load->model('admin/admin_footer');
        $var['main_footer'] = $this->admin_footer->fetch();

        $this->load->view('layouts/admin/default', $var);
    }

    function getOrderNo2($data) {
    //print_r($data);

    $CI = & get_instance();

    $CI->db->select('max(orderno) maxno');
    $CI->db->from('orders');

    date_default_timezone_set('asia/taipei');
    $now=date_create();
    $today = $now->format('Ymd');
    
    $CI->db->like('orderno', $today,"after");
    $query = $CI->db->get();
    $rs = $query->row_array();

    $newno=$today."001";
    
    if (!empty($rs)) {
        if ($rs["maxno"] !="")
        {
            $no_part=substr($rs["maxno"],8,3);
            $dt_part=substr($rs["maxno"],0,8);
            $no_part=str_pad(intval($no_part)+1, 3, "0", STR_PAD_LEFT);
            $newno= $dt_part.$no_part;
        }
    }
    
    $data['orders']['orderno'] = $newno;
    //$data['orders']['dt'] = $now->format('Y-m-d h:i:a');
    $data['orders']['dt'] = $now->format('Y-m-d');

    print_r ($data);
    
    //die('test');

    return $data;
}

}