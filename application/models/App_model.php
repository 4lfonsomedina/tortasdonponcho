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
	function activar_renovacion($correo){
		//activo la renovacion de clave
		$this->db->where("correo",$correo);
		$this->db->update("clientes",array('renovacion'=>1));
		//traigo la llave para el link
		$this->db->select("sha1(clave) as llave");
		$this->db->where("correo",$correo);
		$r=$this->db->get("clientes");
		return $r->row()->llave;

	}
	function verificar_renovacion($token){
		$this->db->where("sha1(clave)",$token);
		$this->db->where("renovacion",1);
		$r=$this->db->get("clientes");
		//echo $this->db->last_query();exit;
		if($r->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function renovacion_clave($token,$clave){
		$this->db->where("sha1(clave)",$token);
		$this->db->update("clientes",array('clave'=>$clave,'renovacion'=>0));
		echo $this->db->last_query();exit;
	}

}

/* End of file App_model.php */
/* Location: ./application/models/App_model.php */