<?php

defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //verificação de sessao
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
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

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('first_name', '', 'trim|required');
        $this->form_validation->set_rules('nome_guerra', '', 'trim|required');
        $this->form_validation->set_rules('fk_id_posto_graduacao', '', 'trim');
        $this->form_validation->set_rules('fk_om_id_om', '', 'trim');
        $this->form_validation->set_rules('email', '', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', '', 'trim');
        $this->form_validation->set_rules('password', '', 'min_length[5]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', '', 'matches[password]');

        if ($this->form_validation->run()) {
            $first_name = $this->security->xss_clean($this->input->post('first_name'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'nome_guerra' => $this->input->post('nome_guerra'),
                'fk_id_posto_graduacao' => $this->input->post('fk_id_posto_graduacao'),
                'fk_om_id_om' => $this->input->post('fk_om_id_om'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
            );
            $group = array($this->input->post('profile_user')); // Sets user to admin.

            $additional_data = $this->security->xss_clean($additional_data);
            $group = $this->security->xss_clean($group);

            // comentar a linha 852 do model ion auth
            if ($this->ion_auth->register($first_name, $password, $email, $additional_data, $group)) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->session->set_flashdata('error', 'Erro ao salvar os dados');
            }

            redirect('usuarios');

            //alterar ion_auth_model

            /* echo '<pre>';
                print_r($additional_data);
                exit();*/
        } else {
            //error da validação
            $data = array(
                'title' => 'Cadastrar Usuário'
            );

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($user_id = NULL)
    {

        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
        } else {
            $this->form_validation->set_rules('first_name', '', 'trim|required');
            $this->form_validation->set_rules('nome_guerra', '', 'trim|required');
            $this->form_validation->set_rules('fk_id_posto_graduacao', '', 'trim');
            $this->form_validation->set_rules('fk_om_id_om', '', 'trim');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check');
            $this->form_validation->set_rules('phone', '', 'trim');
            $this->form_validation->set_rules('password', '', 'min_length[5]|max_length[255]');
            $this->form_validation->set_rules('confirm_password', '', 'matches[password]');

            if ($this->form_validation->run()) {
                $data = elements(
                    array(
                        'first_name',
                        'nome_guerra',
                        'fk_id_posto_graduacao',
                        'fk_on_id_om',
                        'email',
                        'phone',
                        'password'

                    ),
                    $this->input->post()
                );
                //limpando o array por segurança
                $data = $this->security->xss_clean($data);
                //excluindo o elemento caso não seja alterado
                $password = $this->input->post('password');
                if (!$password) {
                    unset($data['password']);
                }
                //user_id para apenas um usuario senao ele atualiza a tabela toda
                //se for diferente atualiza o grupo
                if ($this->ion_auth->update($user_id, $data)) {
                    $profile_user_db = $this->ion_auth->get_users_groups($user_id)->row();
                    $profile_user_post = $this->input->post('profile_user');
                    if ($profile_user_post != $profile_user_db->id) {
                        $this->ion_auth->remove_from_group($profile_user_db->id, $user_id);
                        $this->ion_auth->add_to_group($profile_user_post, $user_id);
                    }
                    $this->session->set_fleshdata('sucesso', 'Dados salvos com sucesso!');
                } else {
                    $this->session->set_fleshdata('error', 'Erro ao salvar dados!');
                }
                redirect('usuarios');
            } else {
                $data = array(
                    'title' => 'Editar Usuarios',
                    'user' => $this->ion_auth->user($user_id)->row(),
                    'profile_user' => $this->ion_auth->get_users_groups($user_id)->row()

                );

                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($user_id = NULL)
    {
        if (!$user_id || !$this->ion_auth->user($user_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não encontrado');
            redirect('usuarios');
        }

        if ($this->ion_auth->is_admin($user_id)) {
            $this->session->set_flashdata('error', 'O administrador não pode ser excluído');
            redirect('usuarios');
        }

        if ($this->ion_auth->delete_user($user_id)) {
            $this->session->set_flashdata('sucesso', 'Usuário excluído com sucesso!');
            redirect('usuarios');
        } else {
            $this->session->set_flashdata('error', 'Usuário não excluído');
            redirect('usuarios');
        }
    }

    // funções de callbakc
    public function email_check($email)
    {
        //recuperando o id do hidden
        $user_id = $this->input->post('user_id');
        // users = tabela, email for igual email e id é diferente do usuario a ser editado logo o email ja existe
        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $user_id))) {
            $this->form_validation->set_message('email_check', 'Esse E-mail já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function username_check($username)
    {
        //recuperar o id do hidden
        $user_id = $this->input->post('user_id');

        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $user_id))) {
            $this->form_validation->set_message('username_check', 'Esse Usuário já existe');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
