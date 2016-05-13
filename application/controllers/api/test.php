<?php

/*
http://jorgeramon.me/2016/in-house-vs-outsourced-software-development-in-professional-services-firms/

http://rest.elkstein.org/2008/01/how-do-i-handle-authentication-in-rest.html
https://dotblogs.com.tw/shadow/2014/05/03/144960
http://www.weblee.co.uk/2009/06/25/secure-jquery-ajax-request/
http://stackoverflow.com/questions/6700822/jquery-how-to-get-the-http-status-code-from-within-the-ajax-error-method
https://teamtreehouse.com/community/running-this-in-localhost-and-keep-getting-a-post-404-not-found
http://stackoverflow.com/questions/22527412/403-forbidden-access-to-codeigniter-controller-from-ajax-request?rq=1


*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class test extends CI_Controller {

    private function send($array) {

        if (!is_array($array)) return false;

        $send = array('frank_csrf_cookie_name' => $this->security->get_csrf_hash()) + $array;
        //$send=$array;

        if (!headers_sent()) {
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: ' . date('r'));
            header('Content-type: application/json');
        }

        exit(json_encode($send, JSON_FORCE_OBJECT));

    }


	public function get()
    {
        $auth = $this->session->userdata('CRUD_AUTH');
        
        //if (empty($auth))
        if (empty($auth))
        {
            //http://stackoverflow.com/questions/22527412/403-forbidden-access-to-codeigniter-controller-from-ajax-request?rq=1
            //$send = array('token' => $this->security->get_csrf_hash()) + $array;
            $this->output->set_status_header('401');
            exit();
        }
        else
        {
           $this->send(
                array(
                    "testdata"=>"testdatavalue",
                    "x-token"=>apache_request_headers()["x-token"]
                )
            );

            exit();
        }        
    }
}

?>