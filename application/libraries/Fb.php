<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Fb {

    private $_ci;

    function __construct() {
        $this->_ci =& get_instance();
    }

    public function get_client() {
        $this->_ci->load->config('fb');

        $fb = new Facebook\Facebook([
            'app_id' => $this->_ci->config->item('fb_client_id'),
            'app_secret' => $this->_ci->config->item('fb_secret_id'),
            'default_graph_version' => 'v3.2',
        ]);

        return $fb;
    }
}