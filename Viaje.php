<?php
include_once 'Pasajero.php';

class Viaje
{
   private $objPasajero;
    private $codigoViaje;//int
    private $destino;//string
    private $cantidadPasajero;
    private $cantMaximaPasajeros;//int-6
    private $personaResp;
    

    public function __construct($objPasajero,$codigo, $destino,$cantMaximaDePasajeros,$personaResp)
    {
        $this->objPasajero=$objPasajero;
        $this->codigoViaje=$codigo;
        $this->destino=$destino;
        $this->cantMaximaPasajeros=$cantMaximaDePasajeros;
        $this->personaResp=$personaResp;
        
    
    }
//Metodos de acceso
    

public function getObjPasajero(){
    return $this->objPasajero;
 }
 public function setObjPasajero($objPasajero){
    $this->objPasajero = $objPasajero;
}
public function getCodigoViaje(){
        return $this->codigoViaje;
    }

public function setCodigoViaje($codigoViaje){
        $this->codigoViaje = $codigoViaje;
  }

public function getDestino(){
        return $this->destino;
    }

public function setDestino($destino){
        $this->destino = $destino;
}

public function getCantidadPasajero(){
        return $this->cantidadPasajero;
    }

   
public function setCantidadPasajero($cantidadPasajero){
        $this->cantidadPasajero = $cantidadPasajero;
    }

 public function getCantMaximaPasajeros(){
        return $this->cantMaximaPasajeros;
    }
public function setCantMaximaPasajeros($cantMaximaPasajeros){
        $this->cantMaximaPasajeros = $cantMaximaPasajeros;
    }

public function getPersonaResp(){
        return $this->personaResp;
     }
public function setPersonaResp($personaResp){
        $this->personaResp=$personaResp;
    }
   
 public function agregarPasajero($pasajero){
        $pasaje = false; 
        if (in_array($pasajero,$this->getObjPasajero())) {
            $pasaje = false; 
            echo "no se puede agregar este pasajero!\n";
        } else {
            $objPasajero=$this->getObjPasajero();
            array_push($objPasajero,$pasajero);
            $this->setObjPasajero($objPasajero);
            $pasaje = true;
            echo "\nse agrego correctamente!\n";
        }
        return $pasaje;
        
    }

    public function quedaLugar(){
        $res= true;
        if ($this->getCantMaximaPasajeros()<=(count($this->getObjPasajero()))){
            $res= false;
        }
        return $res;
    }
    public function eliminarPasajero($pasajero){
        $reducir = false;
        $pasaje = $this->getobjPasajero();
        if(in_array($pasajero, $pasaje)){
            $cod = array_search($pasajero, $pasaje);
            array_splice($pasaje, $cod, 1);
            $this->setObjPasajero($pasaje);
            $reducir = true;
            echo "\nse elimino correctamente!\n";
        }
        return $reducir;
    }

    public function cambiaDatosPasajeros($pasajero, $otroPasajero)
    {
        $psajero_="El pasajero no existe en nuestros registros\n";
        if (in_array($pasajero,$this->getObjPasajero())) {
            $key =array_search($pasajero, $this->getObjPasajero());
            $this->getObjPasajero()[$key]=$otroPasajero;
            $psajero_="El dato de a sido modificado\n";
        }
        return $psajero_;
    }


    public function mostrarPasajero(){
        $mostrarPasajero=[];
        $i=0;
        $objPasaje=$this->getObjPasajero();
        foreach ($objPasaje as $key => $value){
            $nombre=$value['nombre'];
            $apellido=$value['apellido'];
            $dni=$value['DNI'];
            $telefono=$value['telefono'];
           $mostrarPasajero[$i]=array("nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono);
           $i++; 
        }
        return print_r($mostrarPasajero);
    }


    //to_string
    public function __toString(){
     $pasajeros=$this->mostrarPasajero();
     $objPasajeros=$this->getObjPasajero();
     $cantPasajero=count($objPasajeros);
     $pasajero="\n                Información del Viaje\n".
     "Destino: ".$this->getDestino()."\n".
     "Codigo Viaje: ".$this->getCodigoViaje()."\n".
     "Capacidad maxima de ocupantes: ".$this->getCantMaximaPasajeros()."\n".
     "Asientos ocupados: ".$cantPasajero."\n".
     "\nPersona Responsable: "."\n".$this->getPersonaResp()."\n".
     "\n " .$pasajeros."\n";
     return $pasajero;
    }
}
