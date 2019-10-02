<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    function index() {
        $this->load->view('home');
    }

    function search() {
        if(!empty($_REQUEST['s'])){
            $ch = curl_init();
            $url = "http://www.omdbapi.com?apikey=5d663eb&s=".$_REQUEST['s'];
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $output = curl_exec($ch);

            curl_close($ch);
            $res = json_decode($output, TRUE); 
            if(!empty($res) && is_array($res) && isset($res['Search'])){
                $res['text'] = $_REQUEST['s'];
                $data['html'] = $this->load->view('result',$res,TRUE);
                $data['status'] = 200;
            }else{
                $data['status'] = 101;
                $data['message'] = 'Not found';
            }
            
        }else{
            $data['status'] = 102;
            $data['message'] = 'Enter keywords';
        }
        print json_encode($data);
        exit;
    }

    function result(){
        $this->load->view('result');
    }
}
