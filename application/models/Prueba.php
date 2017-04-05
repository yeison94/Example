<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Model {

  function crearNuevo($data){
    $this->load->database();
    $this->db->insert('login',array('id'=>$data['id'],'user'=>$data['usuario'],
    'password'=>$data['contr'],'email'=>$data['mail'],'pasadmin'=>$data['pasad']));
  }

  function obtener_usuarios(){
    $this->load->database();
    // login es la tabla que queremos traer
    $query = $this->db->get('login');
    if($query->num_rows()>0){
      return $query;
    }else{
      return false;
    }
  }

  function obtener_usuario($id){
    $this->load->database();
    //solo regresar los registros de la tabla que coincidan con lo parametros de la condicion
    $this->db->where('user',$id);
    $query = $this->db->get('login');

      // login es la tabla que queremos traer
      if($query->num_rows()>0){
        return $query;
      }else{
        return false;
      }
  }

  function Actualizar($data,$id){
      $this->load->database();
        $this->db->where('user',$id);
        // data debn ser todos los datos asi como en insertar
        $query = $this->db->update('login',$data);
  }

  function Eliminar($user){
      $this->load->database();
        // data debn ser todos los datos asi como en insertar
        $query = $this->db->delete('login',array('user'=>$user));
  }
}
?>
