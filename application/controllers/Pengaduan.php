<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Nama class haru sama persis dengan nama file, termasuk besar kecil nya
class Pengaduan extends CI_Controller {

    // Fungsi yang automatis di eksekusi oleh CI
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home', 'mhome');
		$this->load->model('M_Dashboard', 'mdashboard');
    }

    // Fungsi yang dieksekusi oleh controller ketika url tidak memilih fungsi yang ada di controller untuk di eksekusi
	public function index()
	{
		// Memuat atau menampilkan file php yang terdapat di dalam folder views
		$this->load->view('pengaduan');
	}
	
	public function sendPengaduan()
	{
		if ($this->input->post('submit')) {
            
			$input = array('name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'complain' => $this->input->post('complain'),
			'result' => $this->input->post('result_complain'),
			'created_at' => date('Y-m-d H:i:s'));

			$post = $this->mdashboard->insert('complains', $input);
			if ($post) {
					echo "<script>alert('Pengaduan anda sudah terkirim');
					window.location.href='".base_url()."Pengaduan';</script>";
			}else {
					echo "<script>alert('Pengaduan anda gagal dikirim !!');
					window.location.href='".base_url()."Pengaduan';</script>";
			}
		}else {
			echo "<script>alert('Pengaduan anda gagal dikirim sistem !!');
					window.location.href='".base_url()."Pengaduan';</script>";
		}
	}

	public function Kontak()
	{
		$this->load->view('kontak');
	}

	public function Privacy()
	{
		$this->load->view('privacy');
	}

	public function Disclaimer()
	{
		$this->load->view('disclaimer');
	}

	public function Tentang()
	{
		$this->load->view('tentang');
	}
}