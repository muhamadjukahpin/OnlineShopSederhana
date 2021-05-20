<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Menu_model', 'menu');
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->admin->getUser();
        $data['menu'] = $this->menu->menu();
        $data['menu_management'] = $this->menu->getMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function addMenu()
    {
        $this->menu->addMenu();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
        redirect('menu');
    }

    public function delMenu($id)
    {
        $this->menu->delMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has deleted!</div>');
        redirect('menu');
    }

    public function getedit()
    {
        echo json_encode($this->menu->getMenuById($_POST['id']));
    }

    public function editMenu()
    {
        $this->menu->editMenu($_POST['id']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has edited!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->admin->getUser();
        $data['menu'] = $this->menu->menu();
        $data['menu_management'] = $this->menu->getMenu();
        $data['submenu_management'] = $this->menu->getSubmenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function addSubmenu()
    {
        $this->menu->addSubmenu();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
        redirect('menu/submenu');
    }

    public function delSubmenu($id)
    {
        $this->menu->delSubmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has deleted!</div>');
        redirect('menu/submenu');
    }

    public function geteditSubmenu()
    {
        echo json_encode($this->menu->getSubmenuById($_POST['id']));
    }

    public function editSubmenu()
    {
        $this->menu->editSubmenu($_POST['id']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has edited!</div>');
        redirect('menu/submenu');
    }
}
