<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++Seccion manejo base de datos+++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	public function index()
	{
		$this->load->view('welcome_message');
	}

// Para Crear un nuevo registro en la base de datos
	public function guardar_datos(){
		$this->load->model('Prueba');
		$data = array('id' => 3,
			'usuario' => 'jeison',
			'contr' => 'fsdf',
		  'mail' => 'jahurtado',
	  	'pasad' =>  'sdfs');

			$this->Prueba->CrearNuevo($data);
	}

	// mostrar datos de la base de datos
	public function mostrar_datos(){
		$this->load->model('Prueba');
		$data['usuarios'] = $this->Prueba->obtener_usuarios();
		$this->load->view('Mostar',$data);
	}

  // Mostrar datos con un condicional en la base de datos y enviar datos por la URL
	//http://localhost/CodeIgniter/index.php/Welcome/mostrar_datos
	// Welcome -> 1
	// mostrar_datos -> 2
	public function mostrar_datos_2(){
			$this->load->model('Prueba');
		$data['segmento'] = $this->uri->segment(3);
		if(!$data['segmento']){
			//No se ingreso un dato especifico, por lo que se piden todos los datos de la BD
			$data['usuarios'] = $this->Prueba->obtener_usuarios();
		}else{
			//Obtener solo que cumplan la condicion de segmento
				$data['usuarios'] = $this->Prueba->obtener_usuario($data['segmento']);
		}

			$this->load->view('Mostar',$data);

	}

// actualizar registro
	public function actualizar_registro(){
		$this->load->model('Prueba');
			$data = array('user' => 'diego','password' => '54321' );
				$this->Prueba->Actualizar($data);
	}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++Entregable punto 1+++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
public function mostrar_formulario_inicio_sesion(){
	$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		if($this->session->userdata('username') != ''){
			$this->load->view('Registrado');
		}else{
			$this->load->view('Formulario_registro');
		}
}
public function recibirdatos_datos_formulario_registro(){
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');

	$personas['persona1']  = array('username' =>'Daniel','password' =>'Daniel12345');
	$personas['persona2']  = array('username' =>'Felipe','password' =>'Felipe12345');
	$personas['persona3']  = array('username' =>'Carlos','password' =>'Carlos12345');
	$personas['persona4']  = array('username' =>'Andrea','password' =>'Andrea12345');
	$personas['persona5']  = array('username' =>'Manuela','password' =>'Manuela12345');

	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$aux = false;

	foreach ($personas as $persona) {

		$user = $persona['username'];
		$pass = $persona['password'];

        if(($username == $user) and ($password==$pass)){
				$aux = true;
				break;
				}else{
					$aux = false;
				}
  }

	if($aux){

			$data = array(
							'is_logued_in' => TRUE,
							'username'=> $username);

			$this->session->set_userdata($data);
			$this->mostrar_formulario_inicio_sesion();

				//$this->load->view('welcome_message',$prueba);
		}else{
			$mensaje['usern'] = $this->input->post('username');
			$mensaje['error'] = true;

			$this->load->view('Formulario_registro',$mensaje);
	}
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++Entregable punto 2(calculadora)++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

public function mostrar_calculadora(){
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->view('Caluladora');
}

public function calcular_resultado(){
	$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	$numero1=$this->input->post("number1");
	$numero2=$this->input->post('number2');
	//$this->load->view('Calculadora');

		if( ($numero1>=-1000 and $numero1<=1000) and ($numero2>=-1000 and $numero2<=1000) and ($numero1 != '' and $numero2 != '')){
			if ($this->input->post('resta')){
				$resultado=$numero1-$numero2;
			}
			elseif($this->input->post('suma')){
				$resultado=$numero1+$numero2;
			}
			$data['result']=$resultado;
			//$this->load->vars($data);
			//$this->load->view('Caluladora',$data);
		}else{
		$data['err']="Error: Los Numeros no se encuentran en el rango";

		}
		$this->load->view('Caluladora',$data);
}


}
