<?php

class Hello extends CI_Controller {

    public function index(){
        
        $this->load->model('m_uks');
        $data['uks'] = $this->m_uks->get_data();
        
        $this->load->view('v_uks', $data);

    }
    
}