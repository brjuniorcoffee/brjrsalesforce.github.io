<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends CI_Controller
{

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
		$data['title'] = 'Rincian Modal';
        $data['pengolahan'] = $this->db->get('kategori_pengolahan')->result();
        $data['level_roast'] = $this->db->get('roast_level')->result();
		$data['packaging'] = $this->db->get('packaging')->result();
		$data['produk'] = $this->Product_model->modal_produk();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('modal/rincian_modal', $data);
		$this->load->view('templates/footer');
    }
	public function update_hargaGabah(){
		if ($_POST) {
			$where = $this->input->	post('id_pengolahan');
		$harga_gabah = $this->input->post('harga_gabah');
		 $this->Product_model->update_hargaGabah($where, $harga_gabah);
		}else{
			echo 1;
		}
	}

	public function update_defect(){
		if ($_POST) {
			$where = $this->input->post('id_pengolahan');
		$defect = $this->input->post('defect');
		 $this->Product_model->update_defect($where, $defect);
		}else{
			echo 1;
		}
		

	}
}
