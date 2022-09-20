<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serah_terima extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('laptop_model');
    $this->load->model('karyawan_model');
    $this->load->model('serah_terima_model');

    $this->page = 'serah-terima';
    $this->title = ucwords(str_replace('-', ' ', $this->page));
  }

  public function index()
  { 
    $data['title'] = $this->title;

    $serah_terimas = $this->serah_terima_model->semua()->result_array();

    $data['serah_terimas'] = $serah_terimas;
    $data['karyawans'] = $this->karyawan_model->semua()->result_array();
    $data['laptops'] = $this->laptop_model->semua()->result_array();

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
      $data['id_laptop']         = $this->input->post('id_laptop');
      $data['id_karyawan']       = $this->input->post('id_karyawan');
      $data['tgl_serah_terima']  = $this->input->post('tgl_serah_terima');
      $data['aksesoris_1']       = $this->input->post('aksesoris_1');
      $data['aksesoris_2']       = $this->input->post('aksesoris_2');
      $data['aksesoris_3']       = $this->input->post('aksesoris_3');

      if($this->serah_terima_model->tambah($data)){
        $status = "success";
        $msg    = "Serah terima berhasil ditambahkan";
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

      // $where_laptop['serial_number'] = $data['serial_number'];
  
      // if($this->laptop_model->by($where_laptop)->num_rows() > 0 && ){
      //   $status = "error";
      //   $msg = "Serial number laptop sudah ada, silahkan isikan laptop lain";

      //   $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg))); 
      //   return false;
      // };

      $where_laptop['id'] = $this->input->post('id');

      if($this->laptop_model->update_by_id($where_laptop, $data)){
        $status = "success";
        $msg    = "laptop berhasil diubah";
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
  
      if($this->laptop_model->hapus_by_id($id)){
        $status = "success";
        $msg    = "laptop berhasil dihapus";
      } else{
        $status = "error";
        $msg = "Kesalahan pada server";
      }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
  }

  public function import(){

    if ( isset($_POST['import'])) {

      $file = $_FILES['import_laptop']['tmp_name'];

      // Medapatkan ekstensi file csv yang akan diimport.
      $ekstensi  = explode('.', $_FILES['import_laptop']['name']);

      // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
      if (empty($file)) {
        echo 'File tidak boleh kosong!';
      } else {
        // Validasi apakah file yang diupload benar-benar file csv.
        if (strtolower(end($ekstensi)) === 'csv' && $_FILES["import_laptop"]["size"] > 0) {

          $i = 0;
          $handle = fopen($file, "r");
          while (($row = fgetcsv($handle, 2048))) {
            $i++;
            if ($i == 1) continue;

            $row = explode(';', $row[0]);


            // Data yang akan disimpan ke dalam databse
            $data = [
              'nama_jenisBarang' => $row[0],
              'satuan_jenisBarang' => $row[1],
              'satuanKonversi_jenisBarang' => $row[2],
              'nilaiKonversi_jenisBarang' => $row[3],
            ];

            // Simpan data ke database.
            $this->JenisBarang_model->create($data);
          }

          // fclose($handle);
          redirect('laptop');

        } else {
          echo 'Format file tidak valid!';
        }
      }
    }
  }

}
