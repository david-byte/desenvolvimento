<?php 
defined('BASEPATH') or exit('Ação não permitida');

class Login extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home'
        );
        $this->load->view('layout/header');
        $this->load->view('login/index', $data);
        $this->load->view('layout/footer');
    
}
}