<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Petugas_model', 'petugas');
        $this->load->model('Public_model', 'public');

        is_logged_in();
    }



    public function index()
    {
        $data['title'] = 'Home';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['keperluan'] = $this->petugas->get_keperluan_aktif();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        $data['test'] = $this->petugas->ajax($this->input->post('id_member'));
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function non_member()
    {
        $data['title'] = 'Home';
        $data['welcome'] = 'Selamat Datang di Jogja Adventure Zone';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['keperluan'] = $this->petugas->get_keperluan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/non_member', $data);
        $this->load->view('templates/footer');
    }


    public function keperluan()
    {
        $data['title'] = 'Keperluan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['status'] = $this->db->get('user_status')->result_array();

        $data['keperluan'] = $this->petugas->get_keperluan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/keperluan', $data);
        $this->load->view('templates/footer');
    }

    public function pengunjung()
    {
        $data['title'] = 'Daftar Pengunjung';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $waktusekarang =  date_default_timezone_set('Asia/Jakarta');
        $waktusekarang = date('d/m/Y', time());
        $data['waktusekarang'] = $waktusekarang;
        $data['status'] = $this->db->get('user_status')->result_array();

        $data['keperluan'] = $this->petugas->get_keperluan();
        $hariini = $this->public->tanggal_sekarang();
        $data['record_pengunjung'] = $this->petugas->show_record_kunjungan_hari_ini($hariini);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/pengunjung', $data);
        $this->load->view('templates/footer');
    }
    public function daftar_pengunjung()
    {
        $data['title'] = 'Daftar Pengunjung';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $waktusekarang =  date_default_timezone_set('Asia/Jakarta');
        $waktusekarang = date('d/m/Y', time());
        $data['waktusekarang'] = $waktusekarang;
        $data['status'] = $this->db->get('user_status')->result_array();

        $data['keperluan'] = $this->petugas->get_keperluan();
        $hariini = $this->public->tanggal_sekarang();
        $tanggal = $this->input->get('tanggal');
        $data['date'] = $tanggal;
        $data['dates'] = $hariini;


        $data['record_pengunjung'] = $this->petugas->show_record_by_date($tanggal);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/daftar_pengunjung', $data);
        $this->load->view('templates/footer');
    }

    public function getubah()
    {
        // echo $_POST['id'];
        $datane = $this->petugas->getDataUbah($_POST['id']);
        echo json_encode($datane);
    }

    public function ubahKeperluan()
    {
        $data =
            [
                'id_keperluan' => $this->input->post('id_keperluan'),
                'nama_keperluan' => $this->input->post('nama_keperluan'),
                'is_active' => $this->input->post('is_active'),
            ];
        var_dump($data);
        $this->petugas->ubah_keperluan($data);
    }

    public function keluarkan_record($id, $waktukeluar)
    {
        $this->petugas->check_proses_keluar($id, $waktukeluar);
        $this->session->flashdata('message');
        // $this->public->pesan_row_affected();
        redirect('petugas/pengunjung');
    }


    public function autofill_ajax()
    {
        // $id = $this->input->get('idmember');
        // $this->db->where('id_member', $id);
        // $data = $this->db->get('member')->row_array();


        // // $query = mysqli_query($koneksi, "select * from member where id_member='$id'");
        // // $mahasiswa = mysqli_fetch_array($query);
        // // $data = array(
        // //     'nama'      =>  $mahasiswa['nama_member'],
        // //     'foto'   =>  $mahasiswa['id_member'] . ".jpg"
        // // );
        // echo json_encode($data);

        $datane = $this->petugas->ajax($_POST['id_member']);
        echo json_encode($datane);
    }

    public function ajax_input_date_pengunjung()
    {
        // $datane = $this->petugas->ajax($_POST['id_member']);
        $datane  = $this->input->get('tanggal');
        echo json_encode($datane);
    }


    function get_barang()
    {
        $kode = $this->input->post('id_member');
        $data = $this->petugas->get_data_barang_bykode($kode);
        echo json_encode($data);
    }

    public function simpan_record()
    {
        $waktumasuk = date_default_timezone_set('Asia/Jakarta');
        $waktumasuk = date('Y/m/d h:i:s', time());;
        $data =
            [
                'nama_keperluan' => $this->input->post('keperluan'),
                'nama_pengunjung' => $this->input->post('nama'),
                'catatan' => $this->input->post('catatan'),
                'id_member' => $this->input->post('id_member'),
                'waktu_masuk' => $waktumasuk,

            ];

        $this->petugas->simpan_ke_db($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sukses !</strong> Data berhasil disimpan
</div>');
        $this->session->flashdata('message');

        redirect('petugas/');
    }

    public function simpan_record_non()
    {
        $waktumasuk = date_default_timezone_set('Asia/Jakarta');
        $waktumasuk = date('Y/m/d h:i:s', time());;
        $data =
            [
                'nama_keperluan' => $this->input->post('keperluan'),
                'catatan' => $this->input->post('catatan'),
                'id_umum    ' => $this->input->post('id'),
                'waktu_masuk' => $waktumasuk,
                'nama_pengunjung' => $this->input->post('nama')
            ];

        $this->petugas->simpan_ke_db($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sukses !</strong> Data berhasil disimpan
</div>');
        $this->session->flashdata('message');

        redirect('petugas/non_member');
    }
}
