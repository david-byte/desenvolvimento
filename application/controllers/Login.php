<?php
defined('BASEPATH') or exit('Ação não permitida');

class Login extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login',
            'h1' => 'SICAIS'
        );
        $this->load->view('layout/header_login');
        $this->load->view('login/index', $data);
        $this->load->view('layout/footer');
    }

    public function auth()
    {
        //pegando o input e limpando 
        $identity = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));;
        $remember = FALSE; // remember the user

        if ($this->ion_auth->login($identity, $password, $remember)) {
            redirect('home');
            
        } else {
            $this->session->set_flashdata('error', 'Verifique seu e-mail ou senha');
            redirect('login');
            echo '<pre>';
            print_r($identity);
            exit();
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('login');
    }
}
