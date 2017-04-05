<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->library('session');
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
  }

  function index(){

    $config = array(
        array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required'
        ),
        array(
                'field' => 'salario',
                'label' => 'Salario',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
        ),
        array(
                'field' => 'sexo',
                'label' => 'Sexo',
                'rules' => 'required'
        )
);

$this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('Formulario_nuevo');
        }
        else
        {
                $this->load->view('Formsuccess');
        }
}



}
