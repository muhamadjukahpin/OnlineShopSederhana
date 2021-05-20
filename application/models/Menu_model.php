<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function menu()
    {
        $roleID = $this->session->userdata('role_id');
        $queryMenu = " SELECT `user_menu`.`menu_id`, `menu`
                         FROM `user_menu` JOIN `user_access_menu`
                           ON `user_menu`.`menu_id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $roleID
                     ORDER BY `user_access_menu`.`menu_id` ASC
                    ";

        return $this->menu = $this->db->query($queryMenu)->result_array();
    }

    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getMenuById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_menu')->row_array();
    }

    public function addMenu()
    {
        $menu_id = htmlspecialchars($this->input->post('menu_id', true));
        $menu = htmlspecialchars($this->input->post('menu', true));
        $this->db->insert('user_menu', ['menu_id' => $menu_id, 'menu' => $menu]);
    }

    public function delMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function editMenu($id)
    {
        $menu_id = $this->input->post('menu_id');
        $menu = $this->input->post('menu');
        $this->db->set('menu_id', $menu_id);
        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }

    public function getSubmenu()
    {
        $query = " SELECT `user_sub_menu`.*,`user_menu`.`menu`  
                     FROM `user_sub_menu` JOIN `user_menu`
                       ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getSubmenuById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user_sub_menu')->row_array();
    }


    public function addSubmenu()
    {
        $menu_id = $this->input->post('menu_id', true);
        $title = $this->input->post('title', true);
        $url = $this->input->post('url', true);
        $icon = $this->input->post('icon', true);
        $is_active = $this->input->post('is_active', true);
        $data = [
            'menu_id' => $menu_id,
            'title' => $title,
            'url' => $url,
            'icon' => $icon,
            'is_active' => $is_active
        ];

        $this->db->insert('user_sub_menu', $data);
    }

    public function delSubmenu($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function editSubmenu($id)
    {
        $menu_id = $this->input->post('menu_id', true);
        $title = $this->input->post('title', true);
        $url = $this->input->post('url', true);
        $icon = $this->input->post('icon', true);
        $is_active = $this->input->post('is_active', true);

        $this->db->set('menu_id', $menu_id);
        $this->db->set('title', $title);
        $this->db->set('url', $url);
        $this->db->set('icon', $icon);
        $this->db->set('is_active', $is_active);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
    }
}
