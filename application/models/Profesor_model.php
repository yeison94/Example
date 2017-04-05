<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor_model extends CI_Model {

	private $cedula;
	private $nombre;
	private $fecha_nacimiento;
	private $lugar_nacimiento;
    private $titulo;
    private $departamento;


	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->cedula = isset($value->cedula)? $value->cedula : null;
				$this->nombre = isset($value->nombre)? $value->nombre : null;
				$this->fecha_nacimiento = isset($value->fecha_nacimiento)? $value->fecha_nacimiento : null;
                $this->lugar_nacimiento = isset($value->lugar_nacimiento)? $value->lugar_nacimiento : null;
                $this->titulo = isset($value->titulo)? $value->titulo : null;
                $this->departamento = isset($value->departamento)? $value->departamento : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'cedula':
			case 'nombre':
			case 'fecha_nacimiento':
			case 'lugar_nacimiento':
            case 'titulo':
            case 'departamento':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}


	public function registrar() {
		$data = [
			'cedula' => $this->cedula,
			'nombre' => $this->nombre,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'lugar_nacimiento' => $this->lugar_nacimiento,
            'titulo' => $this->titulo,
            'departamento' => $this->departamento

		];

		return $this->db->insert('profesor', $data);
	}

	// public function obtener_todas() {
	// 	$query = $this->db->get('granjero');

	// 	$result = [];

	// 	foreach ($query->result() as $key=>$granjero) {
	// 		$result[$key] = new Granjero_model($granjero);
	// 	}
	// 	return $result;
	// }

	// public function obtener_datos() {
	// 	$query = $this->db->get_where('granjero', ['id' => $this->id]);
	// 	$result = $query->result();
	// 	if (empty($result)) {
	// 		return FALSE;
	// 	} else {
	// 		$this->id = $result[0]->id;
	// 		$this->nombre = $result[0]->nombre;
	// 		$this->edad = $result[0]->edad;
	// 		$this->sexo = $result[0]->sexo;
	// 		return $this;
	// 	}
	// }

	// public function obtener_fincas() {
	// 	$this->load->model('Finca_model');

	// 	$fincas = $this->Finca_model->obtener_fincas_por_granjero($this);
	// 	//var_dump($fincas);	
	// 	return $fincas;
	// }

	// public function actualizar() {
	// 	$data = [
	// 		'tipo_documento' => $this->tipo_documento,
	// 		'numero_documento' => $this->numero_documento,
	// 		'nombre' => $this->nombre,
	// 		'apellido' => $this->apellido,
	// 		'sexo' => $this->sexo,
	// 		'fecha_nacimiento' => $this->fecha_nacimiento,
	// 		'direccion' => $this->direccion,
	// 		'ciudad' => $this->ciudad,
	// 		'nacionalidad' => $this->nacionalidad,
	// 		'email' => $this->email,
	// 		'telefono' => $this->telefono
	// 	];

	// 	return $this->db->update('persona', $data, array('numero_documento' => $this->numero_documento));
	// }
	
	// public function obtener_persona($numero_documento) {

    //     $query = $this->db->get_where('persona', array('numero_documento' => $numero_documento));
    //     return $query->row_array();
	// }

}
