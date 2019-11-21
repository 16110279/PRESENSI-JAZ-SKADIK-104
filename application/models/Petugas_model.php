<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    public function get_keperluan()
    {
        return $this->db->get('keperluan')->result_array();
    }
    public function get_keperluan_aktif()
    {

        $this->db->where('is_active', '1');
        return $this->db->get('keperluan')->result_array();
    }

    public function get_keperluan_by_id($id)
    {
        $this->db->where('id_keperluan', $id);
        return $this->db->get('keperluan')->row_array();
    }

    public function getDataUbah($id)
    {
        $this->db->where('id_keperluan', $id);
        return $this->db->get('keperluan')->row_array();
    }

    public function ubah_keperluan($data)
    {
        $id = $data['id_keperluan'];
        $this->db->where('id_keperluan', $id);
        $this->db->update('keperluan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sukses !</strong> Perubahan berhasil disimpan
</div>');
        $this->session->flashdata('message');
        redirect('petugas/keperluan');
    }

    public function show_record_kunjungan_hari_ini()
    {
        $value =  date_default_timezone_set('Asia/Jakarta');
        $value = date('Y-m-d', time());
        // $query = "SELECT member.id_member, member.nama_member, record.id, record.nama_keperluan, record.catatan, record.tgl_masuk, record.tgl_keluar
        // FROM member JOIN record ON member.id_member = record.id_member
        // WHERE tgl_keluar = $value";
        $query = "SELECT member.id_member, record.id, record.id_umum, record.nama_pengunjung, record.nama_keperluan, record.catatan, record.waktu_masuk, record.waktu_keluar    
        FROM member JOIN record ON member.id_member = record.id_member WHERE DATE(`waktu_masuk`) = CURDATE()";
        return $this->db->query($query)->result_array();
        // return $this->db->get('record')->result_array();
    }

    public function show_record_by_date($value)
    {

        // $query = "SELECT member.id_member, member.nama_member, record.id, record.nama_keperluan, record.catatan, record.tgl_masuk, record.tgl_keluar
        // FROM member JOIN record ON member.id_member = record.id_member
        // WHERE tgl_keluar = $value";
        $query = "SELECT member.id_member, member.nama_member, record.id, record.nama_keperluan, record.catatan, record.waktu_masuk, record.waktu_keluar    
        FROM member JOIN record ON member.id_member = record.id_member WHERE DATE(`waktu_masuk`) = '$value'";
        return $this->db->query($query)->result_array();
        // return $this->db->get('record')->result_array();
    }

    public function keluar($id)
    {
        $this->db->where('id', $id);
        $waktu =  date_default_timezone_set('Asia/Jakarta');
        $waktu = date('Y-m-d h:i:s', time());
        $data = [
            'waktu_keluar' => $waktu
        ];
        var_dump($data);
        $this->db->update('record', $data);
    }

    public function waktu_keluar($value)
    {
        $waktu_keluar = $value;
        if ($waktu_keluar == '0000-00-00 00:00:00') {
            return '';
        }
        if ($waktu_keluar == '0000-00-00%2000:00:00') {
            return '';
        } else {
            return $value;
        }
    }

    public function check_proses_keluar($id, $waktu_keluar)
    {
        $waktu_keluar = $this->waktu_keluar($waktu_keluar);
        // echo $waktu_keluar;
        if ($waktu_keluar == '') {
            $this->keluar($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Berhasil !</strong>
</div>');
        } else {
            ?>
            <javascript>
    <?php


                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Gagal !</strong> Sudah keluar.
</div>');
            }
        }


        public function ajax($id)
        {
            // $id = $this->input->post('id_member');
            // $id = '17-00-020164-0054';
            $this->db->where('id_member', $id);
            return $this->db->get('member')->row_array();
        }


        public function simpan_ke_db($data)
        {
            $this->db->insert('record', $data);
        }


        public function getDataUser($id)
        {
            // $query = "SELECT * from `user` where id = $id";
            // return $this->db->query($query)->row_array();
            $this->db->where('id', $id);
            return $this->db->get('user')->row_array();
        }


        public function get_data_barang_bykode($id)
        {

            if ($id == ' ') {
                $hasil = [];
                return $hasil;
            } else {
                $hsl = $this->db->query("SELECT * FROM member WHERE id_member='$id'");
                if ($hsl->num_rows() > 0) {
                    foreach ($hsl->result() as $data) {
                        $hasil = array(
                            'id_member' => $data->id_member,
                            'nama_member' => $data->nama_member,
                            'alamat_member' => 'Alamat : ' . $data->alamat_member,
                            'jenis_member' => 'Jenis Keanggotaan : ' . $data->jenis_member,
                            'jabatan_member' => 'Jabatan : ' . $data->jabatan_member,
                            'status_member' => 'Status : ' . $data->status_member,
                            // 'foto_member' => '../assets/img/member/' . $data->id_member . '.jpg',
                            'foto_member' => '../assets/img/member/' . $data->foto_member,
                        );
                    }
                }
                return $hasil;
            }
        }
    }
