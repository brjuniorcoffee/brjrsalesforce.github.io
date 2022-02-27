<?php
defined('BASEPATH') or exit('No direct script access allowed');




class Invoice extends CI_Controller
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

		$email = $data['user']['email'];
		$data['title'] = 'Daftar Invoice';

		$data['daftar_invoice'] = $this->Product_model->list_invoice($email);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('invoice/daftar_invoice', $data);
		$this->load->view('templates/footer');
	}
	public function print_invoice($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['orders'] = $this->db->get_where('orders', ['id_order' => $id_order])->result();
		foreach ($data['orders'] as $row) {
			$data['title'] = 'INVOICE_'.$row->invoice;
		}
		$data['print_invoice'] = $this->Product_model->daftar_barangdibeli($id_order);
		$this->load->view('templates/invoice_header', $data);
		$this->load->view('invoice/invoice', $data);
		$this->load->view('templates/invoice_footer');
	}

	public function print_qrcode($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = 'Invoice';

	
		$data['qr_code'] = $this->db->get_where('orders', ['id_order' => $id_order])->result();
		$this->load->view('templates/invoice_header', $data);
		$this->load->view('invoice/barcode_qrcode', $data);
		$this->load->view('templates/invoice_footer');
	}
	public function QRcode($kodenya){
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		QRcode::png(
			$kodenya,
			$outfile = false,
			$level = QR_ECLEVEL_H,
			$size = 5,
			$margin = 1 
		);
	}
	public function invoice_detail($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail Invoice';

		$data['orders'] = $this->db->get_where('orders', ['id_order' => $id_order])->result();
		$data['orders_detail'] = $this->Product_model->detail_order($id_order);
		$data['down_payment'] = $this->db->get_where('down_payment', ['id_order' => $id_order])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar');
		$this->load->view('invoice/invoice_detail', $data);
		$this->load->view('templates/footer');
	}

	public function update_status($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['orders'] = $this->db->get_where('orders', ['id_order' => $id_order])->row_array();
		$data['down_payment'] = $this->db->get_where('down_payment', ['id_order' => $id_order])->row_array();
		
		if (!$_POST) {
			redirect('invoice/invoice_detail/' . $id_order);
		} else {
			$input = (object) $this->input->post(null, true);
			$gambar = $_FILES['gambar'];
		$config['upload_path'] = './assets/foto/bukti_bayar';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']     = '5120';

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$gambar = '';
		} else {
			$gambar = $this->upload->data('file_name');
		}
		if (!$input->pelunasan) {
					$data = [
					'no_resi' => $input->no_resi,
					'status_pembayaran' => $input->status,
					'status_order' => $input->status_barang,
					'bukti_transfer' => $gambar,
					'update_status' => time()
					];
		// 	if ($input->status == "paid" || $input->status_barang == "dikirim") {
		// 	$data = [
		// 			'no_resi' => $input->no_resi,
		// 			'status_pembayaran' => $input->status,
		// 			'status_order' => $input->status_barang,
		// 			'bukti_transfer' => $gambar,
		// 			'update_status' => time()
		// 			];

		// 	}else if ($input->status_barang == "dikirim") {
		// 	$data = [
		// 	'status_order' => $input->status_barang,
		// 	'no_resi' => $input->no_resi,
		// 	'update_status' => time()
		// 	];

		// }else if($input->status_barang == "dikirim" && $input->status == "paid"){
		// 	$data = [
		// 	'no_resi' => $input->no_resi,
		// 	'status_pembayaran' => $input->status,
		// 	'status_order' => $input->status_barang,
		// 	'bukti_transfer' => $gambar,
		// 	'update_status' => time()
		// 	];
		$where = array('id_order' => $id_order);
			$this->Crud_model->update_data($where, $data, 'orders');
			$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
				Status Order <strong>Berhasil</strong> Diperbaharui!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>');
		redirect('invoice/invoice_detail/' . $id_order);
		}
			
		else if ($input->pelunasan){
			$data2 = [
				'id_order' => $id_order,
				'jumlah_dibayar' => $data['orders']['total']+$data['orders']['ongkir']-$data['down_payment']['jumlah_dibayar'],
				'bukti_bayar' => $gambar,
				'update_terakhir' => time()
			];			

			$data = [
				'status_pembayaran' => $input->pelunasan,
				'status_order' => $input->status_barang,
				'no_resi' => $input->no_resi,
				'update_status' => time()
				];				
			
				$where = array('id_order' => $id_order);
				$this->Crud_model->update_data($where, $data, 'orders');
				$this->Crud_model->input_data($data2, 'down_payment');
				$this->session->set_flashdata('message', '<div class="alert alert-success  alert-dismissible fade show " role="alert">
					Status Order <strong>Berhasil</strong> Diperbaharui!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>');
			redirect('invoice/invoice_detail/' . $id_order);
		}
	}
}
	public function print_suratJalan($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = 'Surat Jalan';
		$data['orders'] = $this->db->get_where('orders', ['id_order' => $id_order])->result();
		$data['print_suratJalan'] = $this->Product_model->daftar_barangdibeli($id_order);
		$this->load->view('templates/invoice_header', $data);
		$this->load->view('invoice/surat_jalan', $data);
		$this->load->view('templates/invoice_footer');
	}
	public function export_pdf($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = 'Invoice';
		$data['orders'] = $this->db->get_where('orders', ['id_order' => $id_order])->result();
		$data['print_invoice'] = $this->Product_model->daftar_barangdibeli($id_order);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice-";
		$this->pdf->load_view('invoice/invoice_pdf', $data);
	}
	public function print_label($id_order)
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['title'] = 'Label';

		$data['orders'] = $this->db->get_where('orders', ['id_order' => $id_order])->result();
		$data['orders_detail'] = $this->Product_model->detail_order($id_order);
		$this->load->view('templates/invoice_header', $data);
		$this->load->view('invoice/label', $data);
		$this->load->view('templates/invoice_footer');
	}
}
