<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
	protected $table = "customer";
	public function create()
	{
		$data = array(
			"name" => post('name'),
			"address" => post_null('address'),
			"email" => post_null('email'),
			"telp" => post('telp'),
			"latitude" => post_null('latitude'),
			"longitude" => post_null('longitude'),
			"username" => post('username'),
			"password" => post('password'),
			"role" => 'mitra',
			"status" => 'activated',
			"point" => 0
		);
		$username = $this->data_model->select_where($this->table, array('username' => post('username')));
		if ( !$username->error) {
			error("username is exist");
		} else {
			$do = $this->data_model->insert($this->table, $data);
			if (!$do->error) {
				success("data berhasil ditambahkan", $do->data);
			} else {
				error("data gagal ditambahkan");
			}
		}
	}

	public function get($id = null)
	{
		if ($id == null) {
			$do = $this->data_model->select($this->table);
		} else {
			$do = $this->data_model->select_where($this->table, array("id" => $id));
		}

		if (!$do->error) {
			success("data berhasil ditemukan", $do->data);
		} else {
			error("data gagal ditemukan");
		}
	}

	public function update()
	{
		$data = array(
			"name" => post('name'),
			"address" => post_null('address'),
			"email" => post_null('email'),
			"telp" => post('telp'),
			"latitude" => post_null('latitude'),
			"longitude" => post_null('longitude'),
			"username" => post('username'),
			"password" => post('password'),
			"role" => 'mitra',
			"status" => 'activated',
			"point" => 0
		);

		$where = array(
			"id" => post('id'),
		);

		$do = $this->data_model->update($this->table, $where, $data);
		if (!$do->error) {
			success("data berhasil diubah", $do->data);
		} else {
			error("data gagal diubah");
		}
	}

	public function delete()
	{
		$where = array(
			"id" => post('id')
		);

		$do = $this->data_model->delete($this->table, $where);
		if (!$do->error) {
			success("data berhasil dihapus", $do->data);
		} else {
			error("datat gagal dihapus");
		}
	}
}
