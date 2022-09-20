<?php

  class Laptop_model extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('
                                a.id, id_karyawan, serial_number, merk, model, processor, memory,
                                disk_type_1, disk_type_2, disk_size_1, disk_size_2, gpu_1, gpu_2, display,
                                kondisi, tgl_pembelian, url, a.last_update,
                                nama_lengkap, jabatan, divisi 
                                ')
                              ->from('laptop a')
                              ->join('karyawan b', 'a.id_karyawan=b.id','left');
        $query = $this->db->get(); 
        return $query;
      }

      public function by($where){
        $query = $this->db  ->select('*')
                            ->from('laptop')
                            ->where($where);
        $query = $this->db->get(); 
        return $query;
      }

      public function tambah($data){
        $query = $this->db->insert('laptop', $data);
        return $query;
      }

      public function hapus_by_id($id){
        $query = $this->db->delete('laptop', array('id' => $id));
        return $query;
      }

      public function update_by_id($where, $data){
        $query =    $this->db->where($where)
                            ->update('laptop', $data);
        return $query;
      }	
    }