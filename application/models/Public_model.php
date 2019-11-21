<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Public_model extends CI_Model
{

    public function konversi_status_aktif($value)
    {

        if ($value == 1) {
            $final = 'Aktif';
        }

        if ($value == 0) {
            $final = 'Tidak Aktif';
        }

        return $final;
    }

    public function tanggal_sekarang()
    {
        $value =  date_default_timezone_set('Asia/Jakarta');
        $value = date('Y-m-d', time());
        return $value;
    }

    public function pesan_row_affected()
    {
        if ($this->db->affected_rows() == 1) { }
        if ($this->db->affected_rows() == 0) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Gagal </div>');
        }

        // echo $this->db->affected_rows();
    }
}
