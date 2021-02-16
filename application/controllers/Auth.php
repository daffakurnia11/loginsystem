<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    $this->load->view('auth/templates/header');
    $this->load->view('auth/login');
    $this->load->view('auth/templates/footer');
  }

  public function registration()
  {
    $this->load->view('auth/templates/header');
    $this->load->view('auth/register');
    $this->load->view('auth/templates/footer');
  }
}
