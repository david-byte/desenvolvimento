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

    public function add()
    {
        
            $this->form_validation->set_rules('name', '', 'trim|required|max_length[45]|is_unique[c_a_mil.name]');
            $this->form_validation->set_rules('sigla', '', 'trim|required|max_length[5]|is_unique[c_a_mil.sigla]');

            if ($this->form_validation->run()) {

                $data = elements(
                    array(
                        'name',
                        'sigla'
                    ),
                    $this->input->post()
                );

                $data['name'] = strtoupper($this->input->post('name'));
                $data['sigla'] = strtoupper($this->input->post('sigla'));
                //sanitização
                $data = html_escape($data);

                $this->core_model->insert('c_a_mil', $data);
                redirect('c_mil_a');
            } else {
                //erro de validação
                $data = array(
                    'title' => 'Cadastrar Comando Militar de Área',
                );
                /* echo '<pre>';
                print_r($data['c_mil_a']);
                exit();*/

                $this->load->view('layout/header', $data);
                $this->load->view('c_mil_a/add');
                $this->load->view('layout/footer');
            }
      
    }

    public function edit($id_c_a_mil = NULL)
    {
        if (!$id_c_a_mil || !$this->core_model->get_by_id('c_a_mil', array('id_c_a_mil' => $id_c_a_mil))) {
            $this->session->set_flashdata('error', 'C Mil A não encontrado');
            redirect('c_mil_a');
        } else {
            $this->form_validation->set_rules('name', '', 'trim|required|max_length[45]|callback_check_cmila_name');
            $this->form_validation->set_rules('sigla', '', 'trim|required|max_length[5]|callback_check_cmila_sigla');

            if ($this->form_validation->run()) {

                $data = elements(
                    array(
                        'name',
                        'sigla'
                    ),
                    $this->input->post()
                );

                $data['name'] = strtoupper($this->input->post('name'));
                $data['sigla'] = strtoupper($this->input->post('sigla'));
                //sanitização
                $data = html_escape($data);

                $this->core_model->update('c_a_mil', $data, array('id_c_a_mil' => $id_c_a_mil));
                redirect('c_mil_a');
            } else {
                //erro de validação
                $data = array(
                    'title' => 'Atualizar o Comando Militar de Área',
                    'c_mil_a' => $this->core_model->get_by_id('c_a_mil', array('id_c_a_mil' => $id_c_a_mil))
                );
                /* echo '<pre>';
                print_r($data['c_mil_a']);
                exit();*/

                $this->load->view('layout/header', $data);
                $this->load->view('c_mil_a/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del()
    {
        
    }

    // verificação callback do nome do C Mil A 
    public function check_cmila_name($name)
    {
        //recupera o id para validar se ha ou não registro
        $id_c_a_mil = $this->input->post('id_c_a_mil');

        if ($this->core_model->get_by_id('c_a_mil', array('name' => $name, 'id_c_a_mil !=' => $id_c_a_mil))) {
            $this->form_validation->set_message('check_cmila_name', 'Esse Comando Militar já existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    // verificação callback do nome do C Mil A 
    public function check_cmila_sigla($sigla)
    {
        $id_c_a_mil = $this->input->post('id_c_a_mil');

        if ($this->core_model->get_by_id('c_a_mil', array('sigla' => $sigla, 'id_c_a_mil !=' => $id_c_a_mil))) {
            $this->form_validation->set_message('check_cmila_sigla', 'Essa sigla já existe!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
