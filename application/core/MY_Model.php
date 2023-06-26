<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	protected string $name;

	public function all()
	{
		$this->db->where('deleted_at IS NULL', null, false);
		$this->db->order_by('created_at', 'desc');
		return $this->db->get($this->name)->result();
	}

	public function find($id)
	{
		$this->db->where('id', $id);
		$this->db->where('deleted_at IS NULL', null, false);
		return $this->db->get($this->name)->row();
	}

	public function findBy($column, $value)
	{
		$this->db->where($column, $value);
		$this->db->where('deleted_at IS NULL', null, false);
		return $this->db->get($this->name)->row();
	}

	public function insert($data)
	{
		return $this->db->insert($this->name, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->name, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->name, ['deleted_at' => date('Y-m-d H:i:s')]);
	}
}
