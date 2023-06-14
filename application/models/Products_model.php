<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{
	public function all()
	{
		$this->db->where('deleted_at IS NULL', null, false);
		$this->db->order_by('created_at', 'desc');
		return $this->db->get('products')->result();
	}

	public function find($id)
	{
		$this->db->where('id', $id);
		$this->db->where('deleted_at IS NULL', null, false);
		return $this->db->get('products')->row();
	}

	public function insert($data)
	{
		return $this->db->insert('products', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('products', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->update('products', ['deleted_at' => date('Y-m-d H:i:s')]);
	}
}
