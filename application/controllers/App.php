<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("App_model");
		error_reporting(E_ERROR | E_PARSE);
	}
	function registro(){
		//validacion de campos
		if($_POST['nombre']==""||$_POST['correo']==""||$_POST['clave']==""||$_POST['clave2']==""){
			echo "0|Favor de llenar todos los campos";exit;
		}
		if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    		echo "0|Esta dirección de correo (".$_POST['correo'],") es inválida.";exit;
		}
		if($_POST['clave']!=$_POST['clave2']){
			echo "0|La contraseña no coincide";exit;
		}
		if(strlen($_POST['clave'])<6){
			echo "0|Por seguridad de tus datos, La contraseña debe contener al menos 6 caracteres";exit;
		}
		if($this->App_model->existe_correo($_POST['correo'])){
			echo "0|Esta dirección de correo (".$_POST['correo'],") ya se encuentra registrada.";exit;
		}
		//si paso los filtros debemos registrarlo
		$datos = array(
			'nombre' => $_POST['nombre'],
			'correo' => $_POST['correo'],
			'clave' => $_POST['clave']
		);
		$datos['id_cliente']=$this->App_model->registrar($datos);
		
		// estructura : tipo|mensaje
		echo "1|".json_encode($datos);
	}
	function validar_sesion(){
		if($this->App_model->validar_sesion($_POST['correo'],$_POST['clave'])){
			echo "1|".json_encode($this->App_model->get_sesion($_POST['correo'],$_POST['clave']));
		}
		else{echo "0|0";}
	}
	//acceso desde login
	function acceso_sesion(){
		if($_POST['correo']==""||$_POST['clave']==""){
			echo "0|Favor de llenar todos los campos";exit;
		}
		if($this->App_model->validar_sesion($_POST['correo'],$_POST['clave'])){
			echo "1|".json_encode($this->App_model->get_sesion($_POST['correo'],$_POST['clave']));
		}
		else{echo "0|Correo y/o usuario invalidos";}
	}

	//envio de correo para renovacion de clave
	function renovacion(){
		//verificar que el campo no este vacio
		if($_POST['correo']==""){
			echo "0|Favor de llenar el campo de correo";exit;
		}
		//verificar si existe el correo
		if(!$this->App_model->existe_correo($_POST['correo'])){
			echo "0|Esta dirección de correo (".$_POST['correo'],") NO se encuentra registrada.";exit;
		}
		//enviar correo

		$this->load->library('email');
        $this->email->set_newline("\r\n");
        $config = Array(
		    'protocol'  	=> 'smtp',
		    'smtp_host' 	=> 'ssl://smtp.googlemail.com',
		    'smtp_port' 	=> 465,
		    'smtp_user' 	=> 'tortasdonponcho@gmail.com',
		    'smtp_pass' 	=> 'Medinaaljr.920624',
		    'smtp_from_name'=> 'Tortas Do Poncho',
		    'wordwrap' 		=> TRUE,
		    'newline' 		=> "\r\n",
		    'mailtype' 		=> 'html'
		); 
        $this->email->initialize($config);


		$this->email->from('tortasdonponcho@gmail.com', 'Tortas Don Poncho');
		$this->email->to($_POST['correo']);
		$this->email->subject("Recuperación de clave TortasDonPoncho");
		$this->email->message("Esto es una prueba para cambiar clave");
        if($this->email->send()){
            echo $this->email->print_debugger();
        }else{
            echo $this->email->print_debugger();
        }
	}
	//funcion que retorna las ordenes en proceso
	public function get_orden(){

	}

}

/* End of file App.php */
/* Location: ./application/controllers/App.php */