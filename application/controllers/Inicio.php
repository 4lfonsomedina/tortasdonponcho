<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		error_reporting(E_ERROR | E_PARSE);
	}

	public function index()
	{
		$this->load->view('cabecera.php');
		$this->load->view('menu.php');
		$this->load->view('inicio.php');
		$this->load->view('pie.php');
	}
	function aviso_privacidad(){
		$this->load->view('cabecera.php');
		echo '<embed src="'.base_url("assets/aviso_privacidad.pdf").'#toolbar=0" type="application/pdf" width="100%" height="600px" />';
		$this->load->view('pie.php');
	}

}

/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */