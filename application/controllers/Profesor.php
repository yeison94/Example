<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

  function __construct(){
    parent::__construct();
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
  }

  function index(){
  $this->load->view('Home');
  }


  function registrar($opcion = NULL){

    $this->load->model('Profesor_model');

      if($opcion == "formulario"){

        $this->load->view('Registrar_profesor');

      }elseif ($opcion == "validar") {

        $this->form_validation->set_rules('cedula', 'cedula', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required');
        $this->form_validation->set_rules('lugar_nacimiento', 'lugar_nacimiento', 'required');
        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        $this->form_validation->set_rules('departamento', 'departamento', 'required');

       if ($this->form_validation->run() == FALSE){

            $this->load->view('registrar_profesor');

        }else{

          $value['cedula'] = $this->input->post('cedula');
          $value['nombre'] = $this->input->post('nombre');
          $value['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
          $value['lugar_nacimiento'] = $this->input->post('lugar_nacimiento');
          $value['titulo'] = $this->input->post('titulo');
          $value['departamento'] = $this->input->post('departamento');

          $profesor = new Profesor_model($value);
          $resultado = $profesor->registrar();

          if($resultado == TRUE){
            echo "Profesor insertado";
          }else{
            echo "Fallo al insertar profesor";
          }

        }
        
      }
     
  }

//   function listar(){

//      $this->load->model('Granjero_model');
//      $resultado = $this->Granjero_model->obtener_todas();

//     //  var_dump($resultado);
//      $cantidad_granjeros = count($resultado);
//      for ($i=0; $i <  $cantidad_granjeros; $i++) { 
//        	$indice = "granjero".($i+1);
//       	$result[$indice] =  $resultado[$i];
//      }

//     $result['cantidad'] = $cantidad_granjeros;
//      $this->load->view('Listar_granjeros',$result);


//   }

//   function listar_detalle($id = NULL){
//     $this->load->model('Granjero_model');
//     if($id != NULL){
//       $value['id'] = $id;
//       $granjero = new Granjero_model($value);
//       $granjero->obtener_datos();
//       $data['granjero'] = $granjero;
//       $fincas = $granjero->obtener_fincas();
//       $data['fincas'] = $fincas;
//       //var_dump($fincas);
//       $this->load->view('Listar_detalle_granjero',$data);
     
//     }
//   }

//   function inventario(){
//      $this->load->model('Finca_model');
//      $finca = new Finca_model();
//      $total = $finca->inventario_granjeros();
//      //var_dump($total);
//      $data['total'] = $total;
//      $this->load->view('Listar_inventario',$data);
    
//   }
}
