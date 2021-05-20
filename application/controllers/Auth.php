<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        check_session_email();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Login Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->auth->getUser();

        if ($user) {
            if ($user["is_active"] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password is wrong</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!. Please Activated Your email!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        check_session_email();

        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Registration Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $this->auth->addAccount();
            $data = $this->auth->getToken();
            $this->_sendEmail($data['token'], 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Activation your account. if there not email , you must open spam in email</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'merhkolor@gmail.com',
            'smtp_pass' => 'gampang123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('merhkolor@gmail.com');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Forgot Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
            $this->session->set_userdata('forgot_password', true);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->where('token', $token);
                    $this->db->delete('user_token');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Activation success. Please login!</div>');
                    redirect('auth');
                } else {
                    $this->db->where('token', $token);
                    $this->db->delete('user_token');

                    $this->db->where('email', $email);
                    $this->db->delete('users');

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Activation failed. Token expired!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Activation failed. Wrong token!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Activation failed. Wrong email!</div>');
            redirect('auth');
        }
    }

    public function forgotpassword()
    {
        check_session_email();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Forgot Password Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Please check your email to reset password</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function reset()
    {
        if (!$this->session->userdata('forgot_password')) {
            redirect('auth');
        }
        $this->session->unset_userdata('forgot_password');
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->session->set_userdata('email', $email);
                    $this->session->set_userdata('token', $token);
                    $this->resetPassword();
                } else {
                    $this->db->where('token', $token);
                    $this->db->delete('user_token');

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed. Token expired!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed. Wrong token!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed. Wrong email!</div>');
            redirect('auth');
        }
    }

    public function resetPassword()
    {
        if (!$this->session->userdata('email') || !$this->session->userdata('token')) {
            redirect('auth');
        }
        $email = $this->session->userdata('email');
        $token = $this->session->userdata('token');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Reset Password Page";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/reset');
            $this->load->view('templates/auth_footer');
        } else {
            $password = $this->input->post('password1', true);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $this->db->set('password', $password_hash);
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->db->where('token', $token);
            $this->db->delete('user_token');

            $this->session->unset_userdata('email');
            $this->session->unset_userdata('token');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Reset password success. Please login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('name');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public  function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
