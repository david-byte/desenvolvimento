<?php 
defined('BASEPATH') or exit('Ação não permitida');

class Login extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home'
        );
    $this->load->view('login/index', $data);
    
}
}