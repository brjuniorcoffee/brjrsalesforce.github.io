<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		check_login();
	}
	public function index(){
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Data Pelanggan';
        $data['pelanggan'] = $this->db->get('pelanggan')->result();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('pelanggan/index', $data);
		$this->load->view('templates/footer');
	}
	public function pelanggan_baru(){
		$data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

      	if (!$_POST) {
      		redirect('pelanggan/index');
      	}else{
      		$input = (object) $this->input->post(null, true);
      		$data = [
      		'nama_pelanggan' => $input->nama_pelanggan,
      		'contact' => $input->kontak,
      		'alamat' => $input->alamat
      	];
      	$this->Crud_model->input_data($data, 'pelanggan');
      	$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Pelanggan Baru <strong>Berhasil</strong> Ditambahkan!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
					redirect('pelanggan');

      	}
	}
}