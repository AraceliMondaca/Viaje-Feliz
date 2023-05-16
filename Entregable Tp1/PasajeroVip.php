<?php 
/*La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero recuente y cantidad de millas de pasajero*/
include_once 'Pasajero.php';
class PasajeroVip extends Pasajero{
    private $numViaje;
    private $cantMillas;
    public function __construct($numViaje,$cantMillas,$nombre,$apellido,$documento,$telefono,$numeroAsiento,$numTicket){
        $this-> numViaje=$numViaje;
        $this-> cantMillas=$cantMillas;
         parent::__construct($nombre,$apellido,$documento,$telefono,$numeroAsiento,$numTicket);
    }
    public function getNumViaje(){
        return $this->numViaje;
    }
    public function setNumViaje($numViaje){
    $this->numViaje=$numViaje;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }
    public function setCantMillas($cantMillas){
    $this->cantMillas=$cantMillas;
    }
}

?>