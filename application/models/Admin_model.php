<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function user()
    {
        $query = " SELECT `users`.*,`user_role`.`role`
                     FROM `users` JOIN `user_role`
                       ON `users`.`role_id` = `user_role`.`role_id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function userCount()
    {
        return $this->db->get('users')->num_rows();
    }
    public function getUser()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function deluser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function getUserRole()
    {
        $query = "SELECT `users`.*,`user_role`.`role`  
                    FROM `users` JOIN `user_role`
                      ON `users`.`role_id` = `user_role`.`role_id`
                 ";
        return $this->db->query($query)->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function editUserRole()
    {
        $id = $this->input->post('id', true);
        $role_id = htmlspecialchars($this->input->post('role_id', true));
        $this->db->set('role_id', $role_id);
        $this->db->where('id', $id);
        $this->db->update('users');
    }

    public function role()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function addRole()
    {
        $role_id = htmlspecialchars($this->input->post('role_id', true));
        $role = htmlspecialchars($this->input->post('role', true));

        $this->db->insert('user_role', ['role_id' => $role_id, 'role' => $role]);
    }

    public function delRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }

    public function editRole($id)
    {
        $role_id = htmlspecialchars($this->input->post('role_id', true));
        $role = htmlspecialchars($this->input->post('role', true));
        $this->db->where('id', $id);
        $this->db->update('user_role', ['role_id' => $role_id, 'role' => $role]);
    }

    public function changeaccess($roleId, $menuId)
    {
        $data = [
            'role_id' => $roleId,
            'menu_id' => $menuId
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
    }
}
