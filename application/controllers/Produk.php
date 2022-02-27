<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = "Kategori Produk";
		$data['checkout'] = $this->db->get_where('keranjang', ['email' =>
		$this->session->userdata('email')]);
		$data['kategori_produk'] = $this->db->get('kategori_pengolahan')->result_array();
		$data['kategori_bentuk'] = $this->db->get('kategori_bentuk')->result_array();
		$data['level_roast'] = $this->db->get('roast_level')->result_array();
		$data['daftar_produk'] = $this->Product_model->modal_produk();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('produk/produk', $data);
		$this->load->view('templates/footer');
	}
	public function search_produk()
	{
		$keyword = $this->input->post('cari');
		$output = '';
		if ($keyword) {
			$data = $this->Product_model->ajaxsearch_produk($keyword);
			if ($data->num_rows() > 0) {
				foreach ($data->result() as $row) {
					$output .= '<div class="col mb-4">
				<div class="card">
				<img src="' . base_url('assets/foto/produk/') . $row->image . '" class="card-img-top" alt="...">
				  <div class="card-body">
				  <h5 class="card-title"><strong>' . $row->nama_produk . ' </strong></h5>
				  <p class="card-text"><strong>Rp' . number_format($row->harga) . ' </strong></p>
				  <p class="card-text">' . $row->deskripsi . ' </p>
				  <p class="card-text float-right">Stok Sisa: ' . $row->stok . '</p>
				  <p class="card-text badge badge-info"><i class="fas fa-tags"></i>' . $row->kategori_produk . '</p>
				  </div>
				  <div class="card-footer">
				  <div class="input-group">
					  <input type="number" class="form-control" value="1" name="jumlah_produk" id="jumlah_produk">
					  <input type="hidden" value="' . $row->id_produk . '" name="id_produk" id="idproduk">
					  <input type="hidden" value="' . $row->nama_produk . '" name="nama_produk">
					  <input type="hidden" value="' . $row->harga . '" name="harga_produk" id="harga_jual">
					  <div class="input-group-append">
						<button type="button" id="ajax_produk'.$row->id_produk.'" onclick="add_cart('.$row->id_produk.')" class="btn btn-primary" data-nama="' .$row->nama_produk. '" data-idproduk="'.$row->id_produk. '"><i class="fas fa-shopping-cart"></i></button>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  ';
				}
			
			} else {
				$output .= '<script>alert("Produk Tidak Ditemukan")</script>';
			}
			$output .= '';
		}
		echo $output;
	}

	public function kategori_produk()
	{
		$data['kategori_produk'] = $this->db->get('kategori_pengolahan')->result_array();
		$data['daftar_produk'] = $this->Product_model->daftar_produk();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('produk/produk', $data);
		$this->load->view('templates/footer');
	}
	public function tambah_produk()
	{
		$gambar = $_FILES['gambar'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = './assets/foto/produk';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']     = '5120';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Upload Gagal";
				die();
			} else {
				$gambar = $this->upload->data('file_name');
			}

			$data = array(
				'id_kategori_bentuk' => $this->input->post('bentuk_produk'),
				'id_pengolahan' => $this->input->post('kategori_pengolahan'),
				'id_roast' => $this->input->post('level_roast'),
				'nama_produk' => $this->input->post('nama_produk'),
				'deskripsi' => $this->input->post('deskripsi'),
				'stok' => 100,
				'is_available' => $this->input->post('is_available'),
				'image'	 => $gambar,
			);

			$this->Crud_model->input_data($data, 'produk');
			$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Produk Baru Berhasil Ditambahkan!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('produk');
		}
	}
	public function hapuskategori_produk($id_kategori)
	{
		$where = array('id_kategori' => $id_kategori);
		$this->Crud_model->hapus_data($where, 'kategori_produk');
		redirect('produk');
	}

	public function hapus_produk($id_produk)
	{
		$where = array('id_produk' => $id_produk);
		$this->Crud_model->hapus_data($where, 'produk');
		redirect('produk');
	}
	public function tambah_keranjang()
	{
		$jumlah_produk = $this->input->post('jumlah_produk');
		$id_produk = $this->input->post('id_produk');
		$harga_produk = $this->input->post('harga_produk');
		$cek_produk = $this->db->get_where('keranjang', ['id_produk' => $id_produk, 'email' => $this->session->userdata('email')]);
		if ($cek_produk->num_rows() < 1) {
			$data = [
				'email' => $this->session->userdata('email'),
				'id_produk' => $id_produk,
				'harga_produk' => $harga_produk,
				'qty' => $jumlah_produk,
				'subtotal' => $harga_produk * $jumlah_produk
			];
			$this->Crud_model->input_data($data, 'keranjang',);
			$sql = $this->db->get_where('keranjang', ['email' => $this->session->userdata('email')]);
			$tot_item = $sql->num_rows();
			echo $tot_item; 
		} else {
			echo "available";
		}
	}
	public function daftar_keranjang()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Keranjang";
		$email = $this->session->userdata('email');
		$data['keranjang'] = $this->Product_model->daftar_keranjang($email);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('produk/daftar_keranjang', $data);
		$this->load->view('templates/footer');
	}
	public function update_keranjang($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = "Keranjang";
		$email = $this->session->userdata('email');

		if (!$_POST) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning  alert-dismissible fade show " role="alert">
				Oops Terjadi Kesalahan!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('produk/daftar_keranjang');
		}
		if ($this->input->post('qty') < 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning  alert-dismissible fade show " role="alert">
			Kuantitas Produk Tidak Boleh Kosong!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		redirect('produk/daftar_keranjang');
		}
		$data['content']  = $this->db->get_where('keranjang', ['id' => $id])->result();
		if (!$data['content']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show " role="alert">
				Data tidak ditemukan!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('produk/daftar_keranjang');
		}
		$data['input'] = (object) $this->input->post(null, true);
		$where = array(
			'id' => $data['input']->id,
			'email' => $email
		);

		$subtotal = $data['input']->qty * $data['input']->harga;
		$data = array(
			'qty' => $data['input']->qty,
			'harga_produk' => $data['input']->harga,
			'subtotal' => $subtotal
		);

		$this->Crud_model->update_data($where, $data, 'keranjang');
		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Keranjang berhasil diperbaharui!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
		redirect('produk/daftar_keranjang');
	}
	public function update_produk($id_produk)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		if (!$_POST) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning  alert-dismissible fade show " role="alert">
				Oops! Terjadi Kesalahan
			  </div>');
			redirect('produk/daftar_keranjang');
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$gambar = $_FILES['gambar'];
			if ($gambar = '') {
			} else {
				$config['upload_path'] = './assets/foto/produk';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size']     = '5120';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "Upload Gagal";
					die();
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$data = array(
				'nama_produk' => $data['input']->nama_produk,
				'stok' => $data['input']->jumlah_stok,
				'image' => $gambar
			);
			$where = array(
				'id_produk' => $id_produk
			);
			$this->Crud_model->update_data($where, $data, 'produk');
			$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Produk berhasil diperbaharui!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('produk');
		}
	}
}
