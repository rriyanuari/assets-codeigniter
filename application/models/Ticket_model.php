<?php

  class Ticket_model extends CI_Model {

      public function semua(){
          $query = $this->db  ->select('*')
                              ->from('ticket a');
        $query = $this->db->get(); 
        return $query;
      }

      public function by($where){
        $query = $this->db  ->select('*')
                            ->from('ticket a')
                            ->where($where);
        $query = $this->db->get(); 
        return $query;
      }

      public function tambah($data){
        $query = $this->db->insert('ticket', $data);
        return $query;
      }

      public function hapus_by_id($id){
        $query = $this->db->delete('ticket', array('id' => $id));
        return $query;
      }

      public function update_by_id($where, $data){
        $query =    $this->db->where($where)
                            ->update('ticket', $data);
        return $query;
      }	
    }