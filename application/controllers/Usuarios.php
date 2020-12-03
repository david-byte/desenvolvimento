<?php 

defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => 'Usuarios Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'users' => $this->ion_auth->users()->result()
        );

        $this->load->view('layout/header',$data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }
}