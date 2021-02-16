<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
    $data['title'] = 'Menu Management';

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been added!</div>');
      redirect('menu');
    }
  }

  public function edit()
  {
    $menu = $this->input->post('menu');
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_menu', ['menu' => $menu]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been updated!</div>');
    redirect('menu');
  }

  public function update()
  {
    echo json_encode($this->db->get_where('user_menu', ['id' => $this->input->post('id')])->row_array());
  }

  public function delete($id)
  {
    $this->db->delete('user_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been deleted!</div>');
    redirect('menu');
  }

  public function submenu()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
    $data['title'] = 'Sub Menu Management';

    $this->load->model('Menu_model', 'menu');

    $data['submenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
    $this->form_validation->set_rules('url', 'URL', 'required|trim');
    $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => ($this->input->post('active') == 'on') ? '1' : 0
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been added!</div>');
      redirect('menu/submenu');
    }
  }

  public function editsub()
  {
    $data = [
      'title' => $this->input->post('title'),
      'menu_id' => $this->input->post('menu_id'),
      'url' => $this->input->post('url'),
      'icon' => $this->input->post('icon'),
      'is_active' => ($this->input->post('active') == 'on') ? '1' : 0
    ];
    // var_dump($data);
    // die;
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_sub_menu', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been updated!</div>');
    redirect('menu/submenu');
  }

  public function updatesub()
  {
    $this->load->model('Menu_model', 'menu');

    echo json_encode($this->menu->getSubMenuById($this->input->post('id')));
  }

  public function deletesub($id)
  {
    $this->db->delete('user_sub_menu', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu has been deleted!</div>');
    redirect('menu/submenu');
  }
}
