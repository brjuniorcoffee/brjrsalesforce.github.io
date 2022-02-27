<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

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

	public function kebutuhan_harian(){
	 $data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();
	 $data['title'] = 'Pembelian';

	 $data['pembelian'] = $this->db->get('pembelian_nonGabah')->result();
	 $data['kategori_pengeluaran'] = $this->db->get('kategori_pengeluaran')->result();
	
	   	$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembelian/kebutuhan_harian', $data);
		$this->load->view('templates/footer');

	}
	public function pembelian_baru(){
	$data['user'] = $this->db->get_where('user', ['email' =>
     $this->session->userdata('email')])->row_array();

		if (!$_POST || $this->input->post('qty') < 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning  alert-dismissible fade show " role="alert">
				Kuantitas Pembelian Tidak Boleh Kosong!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			  redirect('pembelian/kebutuhan_harian');
		}else{
			$input = (object) $this->input->post(null, true);
			$gambar = $_FILES['gambar'];
			if ($gambar='') {}else{
				$config['upload_path'] = './assets/foto/pembelian';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['max_size']     = '5120';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
				echo "Upload Gagal"; die();
				}else {
					$gambar = $this->upload->data('file_name');
				}

			}
			$data = [
				'kat_pengeluaran' => $input->kategori_pengeluaran,
				'barang_dibeli' => $input->nama_barang,
				'qty' => $input->qty,
				'satuan' => $input->satuan,
				'total_harga' => $input->total_harga,
				'tanggal_pembelian' => $input->tanggal_beli,
				'catatan' => $input->catatan,
				'status' => $input->status,
				'bukti_beli' => $gambar,
				'dibuat_oleh' => $this->session->userdata('email'),
				'update' => ''
			];
		$this->Crud_model->input_data($data, 'pembelian_nongabah');
		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Pembelian Baru <strong>Berhasil</strong> Ditambahkan!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
					redirect('pembelian/kebutuhan_harian');
		}
	}
	public function detail_pembelian(){
		$id_beli = $this->input->post('id_pembelian');
	echo json_encode($this->Product_model->tampil_dataPembelian($id_beli)->result());
	}

	public function pembelian_kopi(){
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = 'Pembelian Kopi';

		$data['pembelian_kopi'] = $this->db->get('pembelian_gabah')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembelian/pembelian_kopi', $data);
		$this->load->view('templates/footer');

	}
	public function tambahPembelian_kopi(){
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		if (!$_POST) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning  alert-dismissible fade show " role="alert">
			Kuantitas Pembelian Tidak Boleh Kosong!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  redirect('pembelian/pembelian_kopi');
		}else{
			$input = (object) $this->input->post(null, true);
			$data = [
				'total_harga_gabah' => $input->total_hargaGabah,
				'total_kg_gabah' => $input->total_kgGabah,
				'total_kg_gabah' => $input->total_kgAsalan,
				'sumber_pembelian' => $input->sumber_pembelian,
				'tanggal_pembelian' => $input->tanggal_beli,
				'catatan' => $input->catatan,
				'status' => $input->status,
				'dibuat_oleh' => $this->session->userdata('email')
			];
		}
	}

}
