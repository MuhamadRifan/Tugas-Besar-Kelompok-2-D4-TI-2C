<?php

class Biodata_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
// ===================================================================================================== //
//                                              PEMESANAN                                                //
// ===================================================================================================== //

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

}