<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getUser()
    {
        $email = $this->input->post('email');
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function addAccount()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password1', true));
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $gender = htmlspecialchars($this->input->post('gender', true));
        if ($gender == 'Gender') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gender is undifined</div>');
            redirect('auth/registration');
        }
        if ($gender == 'male') {
            $image = 'male.jpg';
        } else if ($gender == 'female') {
            $image = 'female.jpeg';
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $pass_hash,
            'image' => $image,
            'gender' => $gender,
            'role_id' => 3,
            'is_active' => 0,
            'date_created' => time()
        ];

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->db->insert('users', $data);
    }

    public function getToken()
    {
        $email = $this->input->post('email');
        return $this->db->get_where('user_token', ['email' => $email])->row_array();
    }
}
