<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
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
}
