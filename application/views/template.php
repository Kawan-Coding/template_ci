<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
$this->load->view($content);
$this->load->view('dist/_partials/footer');
