<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
        $this->load->model('Member_model', 'member');
    }

    public function index()
    {
        $data['title'] = 'Daftar Member';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['member'] = $this->member->showAllMember();

        $data['jabatan_member'] = $this->member->get_jabatan_member();
        $data['status_member'] = $this->member->get_status_member();
        $data['jenis_member'] = $this->member->get_jenis_member();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Member';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['member'] = $this->member->showMemberById($id);
        $data['nama'] = $this->member->getName($id);
        $data['record'] = $this->member->showRecordbyName($id);



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/detail', $data);
        $this->load->view('templates/footer');
    }

    // public function test()
    // {
    //     // $id = 17 - 00 - 010672 - 0044;
    //     $data['member'] = $this->member->showMemberById($id);
    //     $this->load->view('member/test', $data);
    // }
}
