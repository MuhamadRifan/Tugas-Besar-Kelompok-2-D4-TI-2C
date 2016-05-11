<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model(array('model_json'));
    }

    function get_data(){
        $mhs = $this->model_json->select();
            // menjadikan objek menjadi JSON
        $data = json_encode($mhs);
            // mengeluarkan JSON ke browser
        header('HTTP/1.1: 200');
        header('Status: 200');
        header('Content-Length: '.strlen($data));
        exit($data);
    }

    function post_data(){
    // Store user submitted data in array
        $nama ['nama'] = $this->input->post('nama');
        $kelas ['kelas'] = $this->input->post('kelas');
        $jurusan ['jurusan'] = $this->input->post('jurusan');

        // Converting $data in json
        $json_data = array(
            'nama' => json_encode($nama), 
            'kelas' => json_encode($kelas), 
            'jurusan' => json_encode($jurusan), 
        );

        // Send json encoded data to model
        $return = $this->model_json->insert_json_in_db($json_data);
            if ($return == true) {
                $data['result_msg'] = 'Json data successfully inserted into database !';
            } else {
                $data['result_msg'] = 'Please configure your database correctly';
            }

        // Load view to show message
        $this->load->view("view_form", $data);
    }

    function put_data(){
    // Store user submitted data in array
        $nama ['nama'] = $this->input->post('nama');
        $kelas ['kelas'] = $this->input->post('kelas');
        $jurusan ['jurusan'] = $this->input->post('jurusan');

        // Converting $data in json
        $json_data = array(
            'nama' => json_encode($nama), 
            'kelas' => json_encode($kelas), 
            'jurusan' => json_encode($jurusan), 
        );

        // Send json encoded data to model
        $return = $this->model_json->insert_json_in_db($json_data);
            if ($return == true) {
                $data['result_msg'] = 'Json data successfully inserted into database !';
            } else {
                $data['result_msg'] = 'Please configure your database correctly';
            }

        // Load view to show message
        $this->load->view("view_form", $data);
    }

    function delete_data(){
    // Store user submitted data in array
        $nama ['nama'] = $this->input->post('nama');
        $kelas ['kelas'] = $this->input->post('kelas');
        $jurusan ['jurusan'] = $this->input->post('jurusan');

        // Converting $data in json
        $json_data = array(
            'nama' => json_encode($nama), 
            'kelas' => json_encode($kelas), 
            'jurusan' => json_encode($jurusan), 
        );

        // Send json encoded data to model
        $return = $this->model_json->insert_json_in_db($json_data);
            if ($return == true) {
                $data['result_msg'] = 'Json data successfully inserted into database !';
            } else {
                $data['result_msg'] = 'Please configure your database correctly';
            }

        // Load view to show message
        $this->load->view("view_form", $data);
    }    
   
    // contoh dengan parameter
    // urlnya : http://localhost/{url di config}/index.php/mahasiswa/cari_nama/{nama}
    function cari_nama($nama){
        $select['nama'] = $nama;
        // mengambil data mahasiswa dari database
            $mhs = $this->model_json->select($select);
            // menjadikan objek menjadi JSON
            $data = json_encode($mhs);
            // mengeluarkan JSON ke browser
        header('HTTP/1.1: 200');
        header('Status: 200');
        header('Content-Length: '.strlen($data));
        exit($data);
    }
   
    // contoh dengan parameter
    // urlnya : http://localhost/{url di config}/index.php/mahasiswa/cari_nim/{nim}
    function cari_nim($nim){
        $select['nim'] = $nim;
        // mengambil data mahasiswa dari database
            $mhs = $this->model_json->select($select);
            // menjadikan objek menjadi JSON
            $data = json_encode($mhs);
            // mengeluarkan JSON ke browser
        header('HTTP/1.1: 200');
        header('Status: 200');
        header('Content-Length: '.strlen($data));
        exit($data);
    }
}
