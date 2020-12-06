<?php

defined('BASEPATH') or exit('Ação não permitida');

class C_mil_a extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // verificando a sessao
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Comando Militar de Área',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css'
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'c_mil_a' => $this->core_model->get_all('c_a_mil')
        );

        $this->load->view('layout/header', $data);
        $this->load->view('c_mil_a/index');
        $this->load->view('layout/footer');
    }

    public function edit($id_c_a_mil = NULL)
    {
        if (!$id_c_a_mil || !$this->core_model->get_by_id('c_a_mil', array('id_c_a_mil' => $id_c_a_mil))) {
            $this->session->set_flashdata('error', 'Cliente não encontrado');
            redirect('c_mil_a');
        } else {
            $this->form_validation->set_rules('name', '', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('sigla', '', 'trim|required|max_length[10]');

            if ($this->form_validation->run()) {
                echo '<pre>';
                print_r($this->input->post());
                exit();
            } else {
                //erro de validação
                $data = array(
                    'title' => 'Atualizar o Comando Militar de Área',
                    'c_mil_a' => $this->core_model->get_by_id('c_a_mil', array('id_c_a_mil' => $id_c_a_mil))
                );
                echo '<pre>';
                print_r($data['c_mil_a']);
                exit();

                $this->load->view('layout/header', $data);
                $this->load->view('c_mil_a/edit');
                $this->load->view('layout/footer');
            }
        }
    }

}
