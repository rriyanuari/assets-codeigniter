<?php

  class Serah_terima_model extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('
                                  a.id, tgl_serah_terima, aksesoris_1, aksesoris_2, aksesoris_3,
                                  nama_lengkap, jabatan, divisi, atasan_langsung,
                                  serial_number, merk, model'
                                )
                              ->from('serah_terima a')
                              ->join('karyawan b', 'a.id_karyawan=b.id')
                              ->join('laptop c', 'a.id_laptop=c.id');
        $query = $this->db->get(); 
        return $query;
      }

      public function by($where){
        $query = $this->db  ->select('*')
                            ->from('serah_terima a')
                            ->join('karyawan b', 'a.id_karyawan=b.id')
                            ->where($where);
        $query = $this->db->get(); 
        return $query;
      }

      public function tambah($data){
        $query = $this->db->insert('serah_terima', $data);
        return $query;
      }

      public function hapus_by_id($id){
        $query = $this->db->delete('serah_terima', array('id' => $id));
        return $query;
      }

      public function update_by_id($where, $data){
        $query =    $this->db->where($where)
                            ->update('serah_terima', $data);
        return $query;
      }	
    }