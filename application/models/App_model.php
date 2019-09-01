<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function existe_correo($correo){
		$this->db->where("correo",$correo);
		$r=$this->db->get("clientes");
		if($r->num_rows()>0){ return TRUE;}
		else{return FALSE;}
	}
	function registrar($datos){
		$this->db->insert("clientes",$datos);
		return $this->db->insert_id();
	}
	function validar_sesion($correo,$clave){
		$this->db->where("correo",$correo);
		$this->db->where("clave",$clave);
		$r=$this->db->get("clientes");
		if($r->num_rows()>0){ return TRUE;}
		else{return FALSE;}
	}
	function get_sesion($correo,$clave){
		$this->db->where("correo",$correo);
		$this->db->where("clave",$clave);
		$r=$this->db->get("clientes");
		return $r->row();
	}

}

/* End of file App_model.php */
/* Location: ./application/models/App_model.php */