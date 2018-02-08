<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $API ="";

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->library('curl');
		$this->API=base_url('api');
        $this->load->library('user_agent');
	}

    function index() {
        if ($this->agent->is_browser() || $this->agent->is_robot() || $this->agent->is_mobile())
        {
                $this->load->view('browser');
        }
        else
        {
                $this->output->set_content_type('text/plain');

                $data['ip'] = $this->input->ip_address();

                $json = json_decode($this->curl->simple_get($this->API, $data, array(CURLOPT_BUFFERSIZE => 10)));

                foreach ($json as $key => $value) {
                    echo $key . " = " . $value . "\n";
                }

        }
    }
}
