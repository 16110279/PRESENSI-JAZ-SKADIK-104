<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_submenu`.*, `user_menu`.`menu`
        FROM `user_submenu` JOIN `user_menu`
        ON `user_submenu`.`menu_id` = `user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAliasStatus()
    {
        $query = "SELECT * FROM `user_status`";

        return $this->db->query($query)->result_array();
    }

    public function getDataUbah($id)
    {
        $query = "SELECT * from `user_menu` where id = $id";
        return $this->db->query($query)->row_array();
    }


    public function getDataUbahSubMenu($id)
    {
        $query = "SELECT * from `user_submenu` where id = $id";
        return $this->db->query($query)->row_array();
    }

    public function ubahMenu($data)
    {
        $id = $data['id'];
        $menu = $data['menu'];

        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }
    public function ubahSubMenu($data)
    {
        $id = $data['id'];
        $title = $data['title'];
        $icon = $data['icon'];

        $this->db->set('title', 'icon', $title, $icon);
        $this->db->where('id', $id);
        $this->db->update('user_submenu', $data);
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_submenu');
    }

    // public function ubahDataMenu($data)
    // {
    //     $id = $data['id'];
    //     $nama = $data['nama'];
    //     $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

    // }
}
