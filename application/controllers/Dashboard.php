<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('laptop_model');
    $this->load->model('karyawan_model');

    $this->page = 'dashboard';
    $this->title = ucwords(str_replace('-', ' ', $this->page));
  }

  public function index()
  { 
    $data['title'] = $this->title;
    $data['laptops'] = $this->laptop_model->semua();
    $data['karyawans'] = $this->karyawan_model->semua();

    $this->load->view('templates/header.php', $data);
    $this->load->view('pages/'. $this->page .'.php', $data);
    $this->load->view('templates/footer.php', $data);
  }
}
