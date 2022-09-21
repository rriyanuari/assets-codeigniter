<?php

  class Printer_model extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('a.id, merk_model, mac_address, ip_address, host_name, url, a.last_update,
                                        b.nama, b.akronim')
                              ->from('printer a')
                              ->join('divisi b', 'a.id_divisi=b.id','left');
        $query = $this->db->get(); 
        return $query;
      }

      public function by($where){
        $query = $this->db  ->select('*')
                            ->from('printer')
                            ->where($where);
        $query = $this->db->get(); 
        return $query;
      }

      public function tambah($data){
        $query = $this->db->insert('printer', $data);
        return $query;
      }

      public function hapus_by_id($id){
        $query = $this->db->delete('printer', array('id' => $id));
        return $query;
      }

      public function update_by_id($where, $data){
        $query =    $this->db->where($where)
                            ->update('printer', $data);
        return $query;
      }	
    }