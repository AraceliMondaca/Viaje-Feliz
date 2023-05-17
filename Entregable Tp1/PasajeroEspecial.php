<?php 
include_once'Pasajero.php';
class PasajeroEspecial extends Pasajero{
    
private $servicioEspecial;
private $asistencia;
private $comidaEspeciales;
public function __construct($servicioEspecial,$asistencia,$comidaEspeciales,$nombre,$apellido,$documento,$telefono,$numeroAsiento,$numTicket){
    $this->servicioEspecial=$servicioEspecial;
    $this->asistencia=$asistencia;
    $this->comidaEspeciales=$comidaEspeciales;
    parent::__construct($nombre,$apellido,$documento,$telefono,$numeroAsiento,$numTicket);
}
public function getServicioEspecial(){
    return $this->servicioEspecial;
}
public function setServicioEspecial($servicioEspecial){
     $this->servicioEspecial=$servicioEspecial;
}
public function getAsistencia(){
    return $this->asistencia;
}
public function setAsistencia($asistencia){
     $this->asistencia=$asistencia;
}
public function getComidaEspeciales(){
    return $this->comidaEspeciales;
}
public function setComidaEspeciales($comidaEspeciales){
     $this->comidaEspeciales=$comidaEspeciales;
}

public function __toString(){
    $especiales=parent::__stoString();
    $especial="";
    $especial=$especiales."\n".
    "servicio especial: ".$this->getServicioEspecial()."\n".
    "asistencia: ".$this->getAsistencia()."\n".
    "comida especial: ".$this->getComidaEspeciales();
    return $especial;

}
}

?>