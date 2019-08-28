<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('cabecera.php');
		$this->load->view('menu.php');
		$this->load->view('inicio.php');
		$this->load->view('pie.php');
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */