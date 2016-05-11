<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		// Load model model_json.php
		$this->load->model('model_json');

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	// Get images from gravatar coeg

	public function get_all_data(){
		// Query from model_json.php
		$ambil = $this->model_json->ambilSemua();

		if(!empty($ambil)){
			foreach ($ambil as $kolom) {
				// data array from database
				$json[] = array(
					'id' 	=> $kolom['id'],
					'nama'		=> $kolom['nama'],
					'kelas' 	=> $kolom['kelas'],
					'jurusan'	=> $kolom['jurusan'],
					'email' 	=> $kolom['email']
				);
			}
		}else{
			$json = array();
		}
		
		// Print with json_encode()
		echo json_encode($json);
	}

	public function get_data(){
		$id = $this->input->get('id');

		// Jika variabel $id tidak kosong
		if(!empty($id)){
			// field condition
			$kolom = array(
				'id' => $id
			);
			// query get one data from model model_json.php
			$ambil = $this->model_json->ambilSatu($kolom);
			$json = array(
				'id' 		=> $ambil['id'],
				'nama'		=> $ambil['nama'],
				'kelas'		=> $ambil['kelas'],
				'jurusan' 	=> $ambil['jurusan'],
				'email' 	=> $ambil['email']
			);
		}else{
			$json = array();
		}

		// Print with json_encode()
		echo json_encode($json);

	}

    // .... Start
    // section post data mahasiswa
    // tambah.html .. controllers.js .. services.js
	public function input_mahasiswaC(){
		$postdata = file_get_contents("php://input");

		$dataObjek = json_decode($postdata);

		@$nama = $dataObjek->data->nama;
		@$kelas = $dataObjek->data->kelas;
		@$jurusan = $dataObjek->data->jurusan;
		@$email = $dataObjek->data->email;

		if(!empty($nama)){
			$input = array(
				// field => isi
				'nama'	=> $nama,
				'kelas'	=> $kelas,
				'jurusan'	=> $jurusan,
				'email'	=> $email
			);

			$simpan = $this->model_json->input_mahasiswaM($input);
			if($simpan){
				$json['status'] = 1;
			}else{
				$json['status'] = 0;
			}

			echo json_encode($json);
		}	

	}

	public function ubah(){
		$postdata = file_get_contents("php://input");

		$dataObjek = json_decode($postdata);

		@$id = $dataObjek->data->id;
		@$nama = $dataObjek->data->nama;
		@$kelas = $dataObjek->data->kelas;
		@$jurusan = $dataObjek->data->jurusan;
		@$email = $dataObjek->data->email;

		if(!empty($nama)){
			$input = array(
				// field => isi
				'nama'	=> $nama,
				'kelas'	=> $kelas,
				'jurusan'	=> $jurusan,
				'email'	=> $email
			);

			// Primary key table buku_tamu
			$idna['id'] = $id;

			// Query ubah di model model_json.php
			$simpan = $this->model_json->ubah($input,$idna);
			if($simpan){
				$json['status'] = 1;
			}else{
				$json['status'] = 0;
			}

			echo json_encode($json);
		}	

	}

	public function hapus(){

		@$id = $this->input->get('id');

		if(!empty($id)){
			$idna['id'] = $id;

			// Query hapus di model model_json.php
			$hapus = $this->model_json->hapus($idna);
			if($hapus){
				$json['status'] = 1;
			}else{
				$json['status']	= 0;
			}
		}

		echo json_encode($json);
	}
	
}