<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function simpan_ke_db($data)
    {
        $this->db->insert('record', $data);
        // redirect('Home');
    }

    public function show_all_user()
    {
        $query = "SELECT user.*, user_role.role
        FROM user JOIN user_role
        on user.role_id=user_role.id";
        return $this->db->query($query)->result_array();
    }

    public function show_all_role()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function getDataUser($id)
    {
        // $query = "SELECT * from `user` where id = $id";
        // return $this->db->query($query)->row_array();
        $this->db->where('id', $id);
        return $this->db->get('user')->row_array();
    }

    public function ubahUser($data)
    {
        $id = $data['id'];
        $username = $data['username'];
        $name = $data['name'];
        $role_id = $data['role_id'];
        $is_active = $data['is_active'];

        $this->db->set('username', $username);
        $this->db->set('name', $name);
        $this->db->set('role_id', $role_id);
        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
