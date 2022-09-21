<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Printer extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('printer_model');
    $this->load->model('serah_terima_model');
    $this->load->model('ticket_model');

    $this->page = 'printer';
    $this->title = ucwords(str_replace('-', ' ', $this->page));
  }

  public function index()
  { 
    $data['title'] = $this->title;

    $data['printers'] = $this->printer_model->semua()->result_array();

    $this->load->view('templates/header.php', $data);
    $this->load->view('pages/'. $this->page .'.php', $data);
    $this->load->view('templates/footer.php', $data);
    $this->load->view('functions/'. $this->page .'.php');
  }

  public function create()
  { 
    // INSERT DATABASE
      // CHANGE TIMEZONE
      date_default_timezone_set("Asia/Jakarta");
      
      $this->load->helper('string');
      $random_url = random_string('alnum', 16);

      // SET DATA
      $data['merk']              = $this->input->post('merk');
      $data['model']             = $this->input->post('model');
      $data['serial_number']     = $this->input->post('serial_number');
      $data['tgl_pembelian']     = $this->input->post('tgl_pembelian');
      $data['id_karyawan']       = ($this->input->post('pic') == "") ? NULL : $this->input->post('pic');
      $data['kondisi']           = $this->input->post('kondisi');
      $data['processor']         = $this->input->post('processor');
      $data['memory']            = $this->input->post('memory');
      $data['display']           = $this->input->post('display');
      $data['disk_type_1']       = $this->input->post('disk_type_1');
      $data['disk_type_2']       = ($this->input->post('disk_type_2') == "") ? NULL : $this->input->post('disk_type_2');
      $data['disk_size_1']       = $this->input->post('disk_size_1');
      $data['disk_size_2']       = ($this->input->post('disk_size_2') == "") ? NULL : $this->input->post('disk_size_2');
      $data['gpu_1']             = $this->input->post('gpu_1');
      $data['gpu_2']             = ($this->input->post('gpu_2') == "") ? NULL : $this->input->post('gpu_2');
      $data['last_update']       = date('Y-m-d H:i:s');
      $data['url']               = $random_url;

      $where_printer['serial_number'] = $data['serial_number'];
  
      if($this->printer_model->by($where_printer)->num_rows() > 0){
        $status = "error";
        $msg = "Serial number printer sudah ada, silahkan isikan printer lain";

        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg))); 
        return false;
      };

      // $status = "error";
      // $msg = $data;

      if($this->printer_model->tambah($data)){
        $status = "success";
        $msg    = "printer berhasil ditambahkan";
      } else{
        $status = "error";
        $msg = "Kesalahan pada server";
      }
      $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg))); 
  }

  public function edit()
  { 
    // INSERT DATABASE
      // CHANGE TIMEZONE
      date_default_timezone_set("Asia/Jakarta");
      
      $this->load->helper('string');

      // SET DATA
      $data['merk']              = $this->input->post('merk');
      $data['model']             = $this->input->post('model');
      $data['serial_number']     = $this->input->post('serial_number');
      $data['tgl_pembelian']     = $this->input->post('tgl_pembelian');
      $data['id_karyawan']          = $this->input->post('pic');
      $data['kondisi']           = $this->input->post('kondisi');
      $data['processor']         = $this->input->post('processor');
      $data['memory']            = $this->input->post('memory');
      $data['display']           = $this->input->post('display');
      $data['disk_type_1']       = $this->input->post('disk_type_1');
      $data['disk_type_2']       = $this->input->post('disk_type_2');
      $data['disk_size_1']       = $this->input->post('disk_size_1');
      $data['disk_size_2']       = $this->input->post('disk_size_2');
      $data['gpu_1']             = $this->input->post('gpu_1');
      $data['gpu_2']             = $this->input->post('gpu_2');
      $data['last_update']       = date('Y-m-d H:i:s');

      // $where_printer['serial_number'] = $data['serial_number'];
  
      // if($this->printer_model->by($where_printer)->num_rows() > 0 && ){
      //   $status = "error";
      //   $msg = "Serial number printer sudah ada, silahkan isikan printer lain";

      //   $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg))); 
      //   return false;
      // };

      $where_printer['id'] = $this->input->post('id');

      if($this->printer_model->update_by_id($where_printer, $data)){
        $status = "success";
        $msg    = "printer berhasil diubah";
      } else{
        $status = "error";
        $msg = "Kesalahan pada server";
      }
      $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg))); 
  }

  public function delete()
  { 
    // INSERT DATABASE
      // GET DATA
      $id       = $this->input->post('id');

      // SET DATA
      $data['id'] = $id;
  
      if($this->printer_model->hapus_by_id($id)){
        $status = "success";
        $msg    = "printer berhasil dihapus";
      } else{
        $status = "error";
        $msg = "Kesalahan pada server";
      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }

}
