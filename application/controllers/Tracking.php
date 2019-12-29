<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking extends CI_Controller
{
	protected $table = "transaction_tracking";
	public function create()
	{
		$data = array(
			"progress" => post('progress'),
			"transaction_id" => post('transaction_id'),
			"zero_id" => post('zero_id'),
			"information" => post('information'),
		);

		$do = $this->data_model->insert($this->table, $data);
		if (!$do->error) {
			success("data berhasil ditambahkan", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}

	public function get($id = null)
	{
		if ($id == null) {
			$do = $this->data_model->select($this->table);
		} else {
			$do = $this->data_model->select_one($this->table, array("transaction_id" => $id));
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
			"column" => post('column'),
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
			error("data gagal dihapus");
		}
	}
}
