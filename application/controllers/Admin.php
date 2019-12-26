<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	protected $template = array(
		'sidebar' => 'component/ap_sidebar',
		'navbar_header' => 'component/ap_navbar_header',
	);
	
	public function index()
	{
		$data = array(
			'content' => 'content/ap_dasboard',
		);
		$this->load->view('template', array_merge($data, $this->template));
	}
}
