<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Menu Management';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        // $data['status'] = $this->menu->getAliasStatus();

        $data['status'] = $this->db->get('user_status')->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        //$data['subMenu'] = $this->db->get('user_submenu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }



    public function getubah()
    {
        // echo $_POST['id'];
        $datane = $this->menu->getDataUbah($_POST['id']);
        echo json_encode($datane);
    }

    public function getubahSubmenu()
    {
        // echo $_POST['id'];
        $datane = $this->menu->getDataUbahSubMenu($_POST['id']);
        echo json_encode($datane);
    }

    public function test()
    {
        // $data =
        //     [
        //         'id' => $this->input->post('id'),
        //         'is_active' => $this->input->post('is_active'),
        //     ];

        // var_dump($data);


        // // echo $data['is_active'];
        // $this->load->view('menu/test', $data);

        // $datane = $this->menu->getDataUbah(2);
        // echo json_encode($datane);
        // var_dump($this->menu->getDataUbah(1));
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Menu Management';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/test', $data);
        $this->load->view('templates/footer');
    }


    public function ubah()
    {
        $data =
            [
                'id' => $this->input->post('id'),
                'menu' => $this->input->post('menu'),
            ];

        $this->menu->ubahMenu($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Menu Berhasil Dirubah </div>');
        redirect('menu');
    }

    public function ubahsubmenu()
    {
        $data =
            [
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];

        var_dump($data);

        $this->menu->ubahSubMenu($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Indicates a successful or positive action.
</div>');
        redirect('menu/submenu');
    }

    public function tambah()
    {
        $data = [
            'id' => $this->input->post('id'),
            'menu' => $this->input->post('menu'),
        ];

        $this->db->insert('user_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                   New Menu Added! </div>');
        redirect('menu');
    }

    public function tambahSubMenu()
    {
        $data =
            [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
        $this->db->insert('user_submenu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                   New Sub menu Added! </div>');
        redirect('menu/submenu');
    }

    public function hapus($id)
    {
        $this->menu->deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Menu Deleted! </div>');
        redirect('menu');
    }

    public function hapusSubmenu($id)
    {
        $this->menu->deleteSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Menu Deleted! </div>');
        redirect('menu/submenu');
    }
}
