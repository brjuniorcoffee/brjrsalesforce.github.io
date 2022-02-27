<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
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

		$data['title'] = 'Checkout';
		$email = $data['user']['email'];
		$data['keranjang'] = $this->Product_model->checkout($email);
		$data['ekspedisi'] = $this->db->get('ekspedisi')->result();

		if (!$data['keranjang']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show " role="alert">
				Oops! Tidak ada produk didalam keranjang
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			redirect('produk/daftar_keranjang');
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('checkout/index', $data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['title'] = 'Checkout Success';
		$email = $data['user']['email'];
		
		if (!$_POST ) {
			redirect('checkout');
		} else {
			$input = (object) $this->input->post(null, true);

			$data['total'] = $this->Product_model->total_order($email);
			
			$gambar = $_FILES['bukti_bayar'];
			$config['upload_path'] = './assets/foto/bukti_bayar';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf';
			$config['max_size']     = '5120';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('bukti_bayar')) {
	$gambar = '';
			} else {
				$gambar = $this->upload->data('file_name');
			}


			if ($input->status_pembayaran == "down_payment") {
				if ($input->down_payment >= $data['total']['sub']) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger  alert-dismissible fade show " role="alert">
				DP tidak boleh sama atau lebih besar dari total belanja!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			  redirect('checkout');
				}else{
					$data1 = [
						'email' => $email,
						'date' => date('Y-m-d'),
						'invoice' => strtoupper(substr($email, 0, 3) . date('YmdHis')),
						'total' => $data['total']['sub'],
						'ekspedisi' => $input->ekspedisi,
						'ongkir' => $input->ongkir,
						'nama_pelanggan' => $input->name,
						'alamat' => $input->alamat,
						'contact' => $input->contact,
						'status_pembayaran' => $input->status_pembayaran,
						'status_order' => $input->status_order,
						'bukti_transfer' => $gambar
					];
	
				$this->Crud_model->input_data($data1, 'orders');
				$data['orders'] = $this->Product_model->getID_order($email);

				
				$data2 = [
					'id_order' => $data['orders']['id'],
					'jumlah_dibayar' =>  $input->down_payment,
					'bukti_bayar' => $gambar,
					'update_terakhir' => date('Y-m-d H:i:s')
					];
				$this->Crud_model->input_data($data2, 'down_payment');
			$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Checkout Berhasil!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');

			  if ($order = $data['orders']['id']) {
				$cart = $this->db->get_where('keranjang', ['email' => $email])->result_array();
				foreach ($cart as $row) {
					$row['id_orders'] = $order;
					unset($row['id'], $row['email']);
					$this->db->insert('orders_detail', $row);
				}
				$this->db->delete('keranjang', ['email' => $email]);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				  Checkout Gagal!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			}
			redirect('checkout/my_order');
				}

			}else{
				
			$data1 = [
				'email' => $email,
				'date' => date('Y-m-d'),
				'invoice' => "BRJr" . date('YmdHis'),
				'total' => $data['total']['sub'],
				'ekspedisi' => $input->ekspedisi,
				'ongkir' => $input->ongkir,
				'nama_pelanggan' => $input->name,
				'alamat' => $input->alamat,
				'contact' => $input->contact,
				'status_pembayaran' => $input->status_pembayaran,
				'status_order' => $input->status_order,
				'bukti_transfer' => $gambar
			];
			$this->Crud_model->input_data($data1, 'orders');
			$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Checkout Berhasil!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
			  $data['orders'] = $this->Product_model->getID_order($email);
			  if ($order = $data['orders']['id']) {
				$cart = $this->db->get_where('keranjang', ['email' => $email])->result_array();
				foreach ($cart as $row) {
					$row['id_orders'] = $order;
					unset($row['id'], $row['email']);
					$this->db->insert('orders_detail', $row);
				}
				$this->db->delete('keranjang', ['email' => $email]);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				  Checkout Gagal!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>');
			}
			redirect('checkout/my_order/'.$data['orders']['id']);
		}
		}
	}
	public function my_order($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');
		$data['orders'] = $this->db->get_where('orders', ['email' => $email, 'id_order' => $id_order])->result();
		foreach ($data['orders'] as $row) {
			$data['title'] = 'Order '. $row->id_order;
		}

		if(!$_POST){
			$this->load->view('forbidden');
		}
		else if ($id_order) {
			$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('checkout/success', $data);
		$this->load->view('templates/footer');
		}
		
	}
	public function hapus_produk($id)
	{
		$where = array('id' => $id);
		$this->Crud_model->delete_data($where, 'keranjang');
		$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
		Produk berhasil dihapus!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');
		redirect('produk/daftar_keranjang');
	}
}
