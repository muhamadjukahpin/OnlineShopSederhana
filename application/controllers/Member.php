<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('User_model', 'user');
        $this->load->model('Member_model', 'member');
        $this->load->model('Menu_model', 'menu');
    }
    public function index()
    {
        $data['title'] = 'Store';
        $data['user'] = $this->user->getUser();
        $data['menu'] = $this->menu->menu();
        $data['item'] = $this->member->getItem();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer');
    }

    public function addItem()
    {
        $data['title'] = 'Form Add Item';
        $data['user'] = $this->user->getUser();
        $data['menu'] = $this->menu->menu();

        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('name_item', 'Name Item', 'required|trim');
        $this->form_validation->set_rules('weight_item', 'Weight Item', 'required|trim');
        $this->form_validation->set_rules('id_province', 'Province', 'required|trim');
        $this->form_validation->set_rules('province', 'Province', 'required|trim');
        $this->form_validation->set_rules('id_city', 'City', 'required|trim');
        $this->form_validation->set_rules('city_name', 'City', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('member/add_item', $data);
            $this->load->view('templates/footer');
        } else {
            $this->member->addItem();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has added!</div>');
            redirect('member');
        }
    }

    public function delItem($id)
    {
        $this->member->getItemById($id);
        $this->member->delItem($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has deleted!</div>');
        redirect('member');
    }

    public function editItem($id)
    {
        $data['title'] = 'Form Edit Item';
        $data['user'] = $this->user->getUser();
        $data['menu'] = $this->menu->menu();
        $data['item'] = $this->member->getItemById($id);

        $this->form_validation->set_rules('no_hp', 'No HP', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('name_item', 'Name Item', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('member/edit_item', $data);
            $this->load->view('templates/footer');
        } else {
            $this->member->editItem();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has edited!</div>');
            redirect('member');
        }
    }

    public function order()
    {
        $data['title'] = 'Order';
        $data['user'] = $this->user->getUser();
        $data['menu'] = $this->menu->menu();
        $data['item'] = $this->member->getItem();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/order', $data);
        $this->load->view('templates/footer');
    }
}
