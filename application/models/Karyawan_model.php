<?php

  class Karyawan_model extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('*')
                              ->from('karyawan');
        $query = $this->db->get(); 
        return $query;
      }

      public function by($where){
        $query = $this->db  ->select('*')
                            ->from('karyawan')
                            ->where($where);
        $query = $this->db->get(); 
        return $query;
      }

      public function tambah($data){
        $query = $this->db->insert('karyawan', $data);
        return $query;
      }

      public function hapus_by_id($id){
        $query = $this->db->delete('karyawan', array('id' => $id));
        return $query;
      }

      public function update_by_id($where, $data){
        $query =    $this->db->where($where)
                            ->update('karyawan', $data);
        return $query;
      }	
    }