<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

	var $API ="";

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->library('curl');
		$this->API="https://ipinfo.io/";
	}

	function index_get(){
		$ip = $this->input->get('ip') == null ? $this->input->ip_address() : $this->input->get('ip');
        $json = json_decode($this->curl->simple_get($this->API . $ip));

        foreach ($json as $key => $value) {
        	$data[$key] = $value;
        }

        $this->response($data, 200);
    }

}
