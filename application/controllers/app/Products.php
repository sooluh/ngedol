<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{
	public Products_model $products;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Products_model', 'products');

		$this->upload->initialize([
			'upload_path' => FCPATH . '/uploads/',
			'allowed_types' => 'png|jpg|jpeg|webp',
			'file_ext_tolower' => true,
			'encrypt_name' => true,
			'detect_mime' => true,
		]);
	}

	public function index()
	{
		$this->load->view('app/products/list', [
			'page' => 'Kelola Produk',
			'products' => $this->products->all(),
		]);
	}

	public function add()
	{
		$csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];

		$this->load->view('app/products/add', [
			'page' => 'Tambah Produk',
			'csrf' => $csrf,
		]);
	}

	public function detail($id = '')
	{
		$product = $this->products->find($id);

		if (empty($product)) {
			$this->output->set_status_header(404);
			return $this->load->view('error');
		}

		$this->load->view('app/products/detail', [
			'page' => "Detail Produk $product->name",
			'detail' => $product,
		]);
	}

	public function edit($id = '')
	{
		$product = $this->products->find($id);

		if (empty($product)) {
			$this->output->set_status_header(404);
			return $this->load->view('error');
		}

		$csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];

		$this->load->view('app/products/edit', [
			'page' => "Perbarui Produk $product->name",
			'detail' => $product,
			'csrf' => $csrf,
		]);
	}

	public function insert()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'name',
				'label' => 'Nama',
				'rules' => 'required|max_length[255]',
				'errors' => [
					'required' => 'Nama tidak boleh kosong.',
					'max_length' => 'Nama tidak boleh lebih dari 255 karakter.',
				],
			],
			[
				'field' => 'type',
				'label' => 'Satuan',
				'rules' => 'required|is_natural_no_zero',
				'errors' => [
					'required' => 'Satuan tidak boleh kosong.',
					'is_natural_no_zero' => 'Satuan tidak valid.',
				],
			],
			[
				'field' => 'stock',
				'label' => 'Stok',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => 'Stok tidak boleh kosong.',
					'is_natural' => 'Stok tidak valid.',
				],
			],
			[
				'field' => 'price',
				'label' => 'Harga',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => 'Harga tidak boleh kosong.',
					'is_natural' => 'Harga tidak valid.',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('failed', array_shift($this->form_validation->error_array()));
			return redirect('app/products');
		}

		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('failed', $this->upload->display_errors('', ''));
			return redirect('app/products');
		}

		$insert = $this->products->insert([
			'name' => $this->input->post('name'),
			'image' => $this->upload->file_name,
			'type' => $this->input->post('type'),
			'stock' => $this->input->post('stock'),
			'price' => $this->input->post('price'),
		]);

		if (!$insert) {
			$this->session->set_flashdata('failed', 'Data produk gagal diperbarui.');
			return redirect('app/products');
		}

		$this->session->set_flashdata('success', 'Data produk berhasil diperbarui.');
		return redirect('app/products');
	}

	public function update($id = '')
	{
		$product = $this->products->find($id);

		if (empty($product)) {
			$this->session->set_flashdata('failed', 'Data produk tidak ditemukan.');
			return redirect('app/products');
		}

		$this->form_validation->set_rules([
			[
				'field' => 'name',
				'label' => 'Nama',
				'rules' => 'required|max_length[255]',
				'errors' => [
					'required' => 'Nama tidak boleh kosong.',
					'max_length' => 'Nama tidak boleh lebih dari 255 karakter.',
				],
			],
			[
				'field' => 'type',
				'label' => 'Satuan',
				'rules' => 'required|is_natural_no_zero',
				'errors' => [
					'required' => 'Satuan tidak boleh kosong.',
					'is_natural_no_zero' => 'Satuan tidak valid.',
				],
			],
			[
				'field' => 'stock',
				'label' => 'Stok',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => 'Stok tidak boleh kosong.',
					'is_natural' => 'Stok tidak valid.',
				],
			],
			[
				'field' => 'price',
				'label' => 'Harga',
				'rules' => 'required|is_natural',
				'errors' => [
					'required' => 'Harga tidak boleh kosong.',
					'is_natural' => 'Harga tidak valid.',
				],
			],
		]);

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('failed', array_shift($this->form_validation->error_array()));
			return redirect('app/products/edit/' . $id);
		}

		if ($_FILES['image']['name'] && !$this->upload->do_upload('image')) {
			$this->session->set_flashdata('failed', $this->upload->display_errors('', ''));
			return redirect('app/products/edit/' . $id);
		}

		$update = $this->products->update($id, [
			'name' => $this->input->post('name'),
			'image' => $this->upload->file_name ?: $product->image,
			'type' => $this->input->post('type'),
			'stock' => $this->input->post('stock'),
			'price' => $this->input->post('price'),
		]);

		if (!$update) {
			$this->session->set_flashdata('failed', 'Data produk gagal diperbarui.');
			return redirect('app/products/edit/' . $id);
		}

		$this->session->set_flashdata('success', 'Data produk berhasil diperbarui.');
		return redirect('app/products/' . $id);
	}

	public function delete($id = '')
	{
		$product = $this->products->find($id);

		if (empty($product)) {
			$this->session->set_flashdata('failed', 'Data produk tidak ditemukan.');
			return redirect('app/products');
		}

		$delete = $this->products->delete($id);

		if (!$delete) {
			$this->session->set_flashdata('failed', 'Data produk gagal dihapus.');
			return redirect('app/products');
		}

		$this->session->set_flashdata('success', 'Data produk berhasil dihapus.');
		return redirect('app/products');
	}
}
