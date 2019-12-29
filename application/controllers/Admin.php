<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$title = 'Dashboard';
		$data = array(
			'content' => $this->load->view('content/ap_dasboard', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function power_go()
	{
		$title = 'Dashboard';
		$data = array(
			'content' => $this->load->view('content/ap_dasboard', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function customer()
	{
		$title = 'Customer Account';
		$data = array(
			'content' => $this->load->view('content/ap_customer', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function zero()
	{
		$title = 'Zero Account';
		$data = array(
			'content' => $this->load->view('content/ap_zero', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function transaction_report()
	{
		$title = 'Dashboard';
		$data = array(
			'content' => $this->load->view('content/ap_dasboard', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function finance_report()
	{
		$title = 'Dashboard';
		$data = array(
			'content' => $this->load->view('content/ap_dasboard', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}
}
