<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    public function showAllMember()
    {
        $this->db->where_not_in('id_member', '');
        return $this->db->get('member')->result_array();
    }

    public function showMemberById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('member')->row_array();
    }

    public function getName($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('member')->row_array();
    }

    public function showRecordbyName($value)
    {
        $this->db->where('member_id', $value);
        return $this->db->get('record')->result_array();
    }

    public function showRecordbyNama($value)
    {
        $this->db->where('nama_pengunjung', $value);
        return $this->db->get('record')->result_array();
    }

    public function get_jabatan_member()
    {
        $jenis = ['Anggota', 'Ketua', 'Bendahara', 'Sekertaris'];
        return $jenis;
    }

    public function get_jenis_member()
    {
        $jenis = ['Reguler', 'AA'];
        return $jenis;
    }

    public function get_status_member()
    {
        $jenis = ['Sipil', 'TNI / Polri'];
        return $jenis;
    }
}
