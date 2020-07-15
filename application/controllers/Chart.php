<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends MY_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
		$is_login	= $this->session->userdata('is_login');
		$this->id	= $this->session->userdata('id');

		if (! $is_login) {
			redirect(base_url());
			return;
		}
	}

	public function index()
	{
		$data['title']		= 'Keranjang Belanja';
		$data['content']	= $this->chart->select([
				'cart.id', 'cart.qty', 'cart.subtotal',
				'product.title', 'product.image', 'product.price'
			])
			->join('product')
			->where('cart.id_user', $this->id)
			->get();
		$data['page']		= 'pages/chart/index';

		return $this->viewData($data);
	}

	public function add()
	{
		if (!$_POST || $this->input->post('qty') < 1) {
			$this->session->set_flashdata('error', 'Kuantitas produk tidak boleh kosong!');
			redirect(base_url());
		} else {
			$input				= (object) $this->input->post(null, true);

			$this->chart->table	= 'product';
			$product			= $this->chart->where('id', $input->id_product)->first();	

			$subtotal			= $product->price * $input->qty;

			$this->chart->table	= 'cart';
			$chart				= $this->chart->where('id_user', $this->id)->where('id_product', $input->id_product)->first();
			
			
			if ($chart) {
				$data = [
					'qty' 		=> $cart->qty + $input->qty,
					'subtotal'	=> $chart->subtotal + $subtotal
				];

				if ($this->chart->where('id', $chart->id)->update($data)) {
					$this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
				} else {
					$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
				}

				redirect(base_url(''));
			}

			$data = [
				'id_user'		=> $this->id,
				'id_product'	=> $input->id_product,
				'qty' 			=> $input->qty,
				'subtotal'		=> $subtotal
			];

			if ($this->chart->create($data)) {
				$this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Oops! Terjadi kesalahan.');
			}

			redirect(base_url(''));
		}
	}

	public function update($id){

		if(!$_POST || $this->input->post('qty') < 1){
			$this->session->set_flashdata('error', 'Kuantitas tidak boleh kosong');
			redirect(base_url('chart/index'));			
		}

		$data['content'] = $this->chart->where('id', $id)->first();
		if(!$data['content']){
			$this->session->set_flashdata('warning', 'Data tidak ditemukan');
			redirect(base_url('chart/index'));
		}

		$data['input'] = (object) $this->input->post(null, true);
		
		$this->chart->table = 'product';

		$product = $this->chart->where('id', $data['content']->id_product)->first();
		$subtotal = $data['input']->qty * $product->price;

		$chart = [
			'qty'		=>	$data['input']->qty,
			'subtotal' 	=>	$subtotal
		];

		$this->chart->table = 'cart';
		if($this->chart->where('id', $id)->update($chart)){
			$this->session->set_flashdata('success', 'Produk berhasil ditambahkan');			
		}
		else{
			$this->session->set_flashdata('error', 'Oopps! Terjadi kesalahan');			
		}

		redirect(base_url('chart/index'));
	}

	public function delete($id)
	{
		if (!$_POST) {
			redirect(base_url('chart/index'));
		}

		if (!$this->chart->where('id', $id)->first()) {
			$this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan.');
			redirect(base_url('chart/index'));
		}

		if ($this->chart->where('id', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
		}

		redirect(base_url('chart/index'));
	}
	

}

/* End of file Cart.php */