<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'JAZ User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // user ada
            if ($user['is_active'] == 1) {
                // jika user aktif
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }
                    if ($user['role_id'] == 2) {
                        // redirect('user');
                    }
                    if ($user['role_id'] == 3) {
                        redirect('petugas');
                    }
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                    Wrong password !
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                username is not activated !
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
            username is not registered !
            </div>');
            redirect('auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            You have been logged out
            </div>');
        redirect('auth');
    }

    public function blocked()
    {

        $data['title'] = 'Not Found';
        $this->load->view('auth/blocked', $data);
    }
}
