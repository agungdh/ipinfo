<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $API ="";

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->library('curl');
		$this->API=base_url('api');
	}

	function index(){
        $this->output->set_content_type('text/plain');

        $data['ip'] = $this->input->ip_address();

        $json = json_decode($this->curl->simple_get($this->API, $data, array(CURLOPT_BUFFERSIZE => 10)));

        foreach ($json as $key => $value) {
            echo $key . " = " . $value . "\n";
        }
    }

    function browser(){
        $this->load->view('browser');
    }

    function check() {
        // foreach (getallheaders() as $name => $value) {
        //     echo "$name: $value\n";
        // }
        // echo $_SERVER['HTTP_USER_AGENT'];
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
                $agent = $this->agent->mobile();
        }
        else
        {
                $agent = 'Unidentified User Agent';
        }

        echo $agent;

        echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)

    }
}
