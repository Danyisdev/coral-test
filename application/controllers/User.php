<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users_model', 'user');
  }

  public function profile()
  {
    checkSession();
    $user = $this->user->get_by_id($this->encryption->decrypt(login_sess('user_id')));
    $data = [
      'pagename' => 'Profile',
      'profile' => $user['data']
    ];
    $this->load->view("layout/header", $data);
    $this->load->view("layout/navbar");
    $this->load->view("layout/sidebar");
    $this->load->view("layout/wrapopen ");
    $this->load->view("main/profile_view");
    $this->load->view("layout/wrapclose");
    $this->load->view("layout/footer");
  }
}
