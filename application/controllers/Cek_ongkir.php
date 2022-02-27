<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_ongkir extends CI_Controller {

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

public function jne(){
    $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
        $data['title'] = "JNE";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
    $this->load->view('cek_ongkir/jne');
    $this->load->view('templates/footer');
}

public function anter_aja(){
    $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
        $data['title'] = "Anter Aja";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cek_ongkir/anter_aja');
    $this->load->view('templates/footer');
}

public function jt(){
    $data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
        $data['title'] = "J&T";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cek_ongkir/jt');
    $this->load->view('templates/footer');
}

public function pos_indonesia(){
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['title'] = "Pos Indonesia";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cek_ongkir/pos_indonesia');
    $this->load->view('templates/footer');
}


}