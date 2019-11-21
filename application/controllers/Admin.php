<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function createuser()
    {
        $data['title'] = 'Create User';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/registration', $data);
        $this->load->view('templates/footer');
    }


    public function manageuser()
    {
        $data['title'] = 'Management User';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['alluser'] = $this->admin->show_all_user();
        $data['role'] = $this->admin->show_all_role();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manageuser', $data);
        $this->load->view('templates/footer');
    }

    public function get_form_data()
    {
        $idmember = $this->input->post('idmember');
        $nama = $this->input->post('nama');
        $keperluan = $this->input->post('keperluan');
        $data = [
            'ID_member' => $idmember,
            'Nama' => $nama,
            'Keperluan' => $keperluan
        ];
        $this->admin->simpan_ke_db($data);
    }


    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function roleAccess($role_id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Role  Access';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $data['menu'] = $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data =
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ];

        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
            Access Changed !
            </div>');
    }
    public function getubahUser()
    {
        // echo $_POST['id'];
        $datane = $this->admin->getDataUser($_POST['id']);
        echo json_encode($datane);
    }

    public function ubahuser()
    {
        $data =
            [
                'id' => $this->input->post('id'),
                'username' => $this->input->post('username'),
                'name' => $this->input->post('nama'),
                'role_id' => $this->input->post('role'),
                'is_active' => $this->input->post('is_active'),
            ];

        var_dump($data);

        $this->admin->ubahUser($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Data user telah berhasil di update
</div>');
        redirect('admin/manageuser');
    }
}
