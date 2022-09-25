<?php

class M_uks extends CI_Model {

    public function get_data(){

        return $this->db->get('uks')->result_array();
    }
}