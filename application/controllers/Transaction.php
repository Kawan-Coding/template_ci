<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
	protected $table = "transaction";
	private function customer_history($customer_id)
	{
		$tgl = "'" . date("Y/m/d H:i:s") . "'";
		$do = $this->data_model->select_like('transaction', "created_at < $tgl", array('customer_id' => $customer_id));
		if (!$do->error) {
			return $do->data;
		} else {
			error("sistem berkendala, ada yang salah!!!");
		}
	}

	private function last_id()
	{
		$tgl = "'" . date("Y/m/d H:i:s") . "'";
		$do = $this->data_model->select_one('transaction', "created_at < $tgl");
		if (!$do->error) {
			return $do->data->id;
		} else {
			error("sistem berkendala, ada yang salah!!!");
		}
	}

	private function id_transaction($customer_id)
	{
		$id = $this->last_id();
		$get = $this->customer_history($customer_id);
		return 'ZR' . post("customer_id") . '-' . (count($get) + 1) . '0L0' . $id;
	}

	public function create()
	{
		$customer_id = post("customer_id");
		$date_request = tgl(post('date_request'));
		$estimated_weight = post('estimated_weight');
		if ($estimated_weight < 20)
			error("Jumlah minyak kurang dari 20 Kg");

		$data = array(
			"id_transaction" => $this->id_transaction($customer_id),
			"customer_id" => $customer_id,
			"date_request" => $date_request,
			"mitra_name" => post('mitra_name'),
			"telp" => post('telp'),
			"address" => post('address'),
			"latitude" => post('latitude'),
			"longitude" => post('longitude'),
			"estimated_weight" => post('estimated_weight'),
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
		$type = post('type');
		if ($type === 'date') {
			$data = array(
				"date_deal" => tgl(post('date_deal')),
			);
		} else if ($type === 'weight') {
			$data = array(
				"real_weight" => post('real_weight'),
				"cost" => post("cost"),
				"progress" => "finish"
			);
		} else if ($type === 'progress') {
			$data = array(
				"progress" => post("progress")
			);
		}


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
