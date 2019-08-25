<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('inicio.php');
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */