<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$this->load->view('login');
	}

	public function proseslogin()
	{
		$data = $this->m_login->model_login();
		$nip = $this->session->userdata('nip');
		if($nip==""){
			$this->load->view('login');
		}else{
			redirect('login/logout');
		}
	}

	public function ceklog(){
		$nip = $this->input->post("nip");
		$nama = $this->input->post("nama");
		$where = array(
			'nip' => $nip,
			'nama' => $nama);

		$cek = $this->m_login->model_login("karyawan", $where)->num_rows();
		if($cek >= 0){
			$data_session = array(
			'nip' => $nip,
			'status' => "login");

			$this->session->set_userdata($data_session);
		redirect('welcome/tampil');
		}else{
			$pesan = "Login Gagal! Masukkan Data Dengan Benar!";
        echo "<script type='text/javascript'>alert('$pesan'); </script>";
        echo "<meta http-equiv='refresh' content='1;url=login'>";
		}
	}

	public function tampil(){
		$this->load->view('tampilpaket');
	}

	public function tambah(){
		$this->load->view('tambahpaket');
	}

	public function tambahp(){
		$this->load->view('tambahpenghuni');
	}

	public function edit(){
		$this->load->view('edit');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}


}
