<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qr extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('laptop_model');
    $this->load->model('serah_terima_model');
    $this->load->model('ticket_model');

    $this->page = 'qr';
    $this->title = ucwords(str_replace('-', ' ', $this->page));
  }

  public function index($random)
  {
    $data['title'] = $this->title . " | Cetak - " . $random;


    $where['url'] = $random;
    $data['laptop'] = $this->laptop_model->by($where)->row_array();

    // $this->load->view('templates/header.php', $data);
    $this->load->view('pages/cetak-qr.php', $data);
    // $this->load->view('templates/footer.php', $data);
    // $this->load->view('functions/'. $this->page .'.php');
  }
  
  public function check($random)
  {
    $data['title'] = $this->title . " | Check - ";


    $where['url'] = $random;
    $laptop = $this->laptop_model->by($where)->row_array();

    $data_merge = array();

    $item = $laptop;

    $where_laptop['id_laptop'] = $laptop['id'];
    $item['serah_terimas'] = $this->serah_terima_model->by($where_laptop)->result_array();
    $item['maintenances'] = $this->ticket_model->by($where_laptop)->result_array();
    array_push($data_merge, $item);

    $data['laptops'] = $data_merge;

    $this->load->view('templates/header.php', $data);
    $this->load->view('pages/check-qr.php', $data);
    $this->load->view('templates/footer.php', $data);
    // $this->load->view('functions/'. $this->page .'.php');
  }
}
