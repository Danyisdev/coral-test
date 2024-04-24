<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    checkSession();
    $data = [
      'pagename' => 'Dashboard',
    ];
    $this->load->view("layout/header", $data);
    $this->load->view("layout/navbar");
    $this->load->view("layout/sidebar");
    $this->load->view("layout/wrapopen ");
    $this->load->view("main/dashboard_main_view");
    $this->load->view("layout/wrapclose");
    $this->load->view("layout/footer");
  }
}
