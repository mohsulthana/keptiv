<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_user extends CI_Model {

    public function check_login_google($data) {

        if($this->db->get_where('users', ['email' => $data['email']])->row_array() == 0) {
            $this->db->insert('users', $data);
            return $user = $this->db->get_where('users', ['email' => $data['email']])->row_array();            
        } else {
            return $user = $this->db->get_where('users', ['email' => $data['email']])->row_array();
        }

    }

}