<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_json extends CI_Model {

    public function ambilSemua(){
        $query = $this->db->get('data_mahasiswa');
        $query = $query->result_array();

        return $query;
    }

    public function ambilSatu($where=array()){
        $query = $this->db->get_where('data_mahasiswa',$where);
        $query = $query->result_array();

        if($query){
            return $query[0];
        }
    }

    // .... Start
    // section post data mahasiswa
    // tambah.html .. controllers.js .. services.js
    public function input_mahasiswaM($inp=array()){
        $query = $this->db->insert('data_mahasiswa',$inp);
        return $query;
    }

    // section put data mahasiswa
    public function ubah($inp=array(),$id=array()){
        $query = $this->db->update('data_mahasiswa',$inp,$id);
        return $query;
    }

    // section delete data mahasiswa
    public function hapus($inp=array()){
        $query = $this->db->delete('data_mahasiswa',$inp);
        return $query;
    }

}