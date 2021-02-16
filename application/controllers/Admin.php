<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
    $data['title'] = 'Dashboard';

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function role()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();
    $data['title'] = 'Role Management';

    $this->form_validation->set_rules('role', 'Role', 'required|trim|is_unique[user_role.role]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('user_role', ['role' => $this->input->post('role')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been added!</div>');
      redirect('admin/role');
    }
  }

  public function editrole()
  {
    $role = $this->input->post('role');
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('user_role', ['role' => $role]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been updated!</div>');
    redirect('admin/role');
  }

  public function updaterole()
  {
    echo json_encode($this->db->get_where('user_role', ['id' => $this->input->post('id')])->row_array());
  }

  public function deleterole($id)
  {
    $this->db->delete('user_role', ['id' => $id]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been deleted!</div>');
    redirect('admin/role');
  }

  public function access($role_id)
  {
    $data['title'] = 'Role Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/access', $data);
    $this->load->view('templates/footer');
  }

  public function changeaccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access has successfully changed!</div>');
  }
}
