<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['title'] = 'Login';
    $this->load->view('auth/templates/header', $data);
    $this->load->view('auth/login');
    $this->load->view('auth/templates/footer');
  }

  public function registration()
  {
    $data['title'] = 'Registration';

    // Form Validation Rules
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email has been registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password don\'t match!',
      'min_length' => 'Password is too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('auth/templates/header', $data);
      $this->load->view('auth/register');
      $this->load->view('auth/templates/footer');
    } else {
      $data = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created!</div>');
      redirect('auth');
    }
  }
}
