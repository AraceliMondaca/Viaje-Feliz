<?php
include_once 'Pasajero.php';
include_once 'PasajeroVip.php';
include_once 'PasajeroEspecial.php';
class Viaje
{
   private $objPasajero;
    private $codigoViaje;
    private $destino;
    private $cantidadPasajero;
    private $cantMaximaPasajeros;
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

    /* debe incorporar el pasajero a la colección 
    de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados 
    y retornar el costo final que deberá ser abonado por el pasajero.*/
   
 public function venderPasaje($pasajero){
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

    public function hayPasajesDisponible(){
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
            $asiento=$value['asiento'];
            $ticket=$value['ticket'];
           $mostrarPasajero[$i]=array("nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono,"asiento"=>$asiento,"ticket"=>$ticket);
           
           $i++; 
        }
        return print_r($mostrarPasajero);
    }
/* retorne el porcentaje que debe aplicarse como incremento 
según las características del pasajero. Para un pasajero VIP 
se incrementa el importe un 35% y si la cantidad de millas acumuladas 
supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales
 y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; 
 si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes
  el porcentaje de incremento es del 10 %.*/
public function darPorcentajeIncremento(){
    $objPasaje=$this->getObjPasajero();
    $i=0;
    foreach ($objPasaje as $key => $value){

        $asiento=$value ['asiento'];
        $servicio=$value ['servicio especial'];
        $servicio1=$value ['asistencia'];
        $servicio2=$value ['comida especial'];
        $milla=$value ['cantMillas'];
    if($asiento==1&&$asiento<7){
        $pasajero="VIP";
    }elseif($asiento>7&&$asiento<13){
         $pasajero="Especial";
    }
$porcentaje=(100/1)*10;
if($pasajero=="VIP"){
    if ($milla>300){
        $porcentaje=(100/1)*30;
    }
    $porcentaje=((100/1)*35)+1500;

}elseif ($pasajero=="Especial"){
    if ($servicio=="si"&&$servicio1=="si"&&$servicio2=="si") {
        $porcentaje=(100/1)*30;
    }
    $porcentaje=(100/1)*15;
}
$porcentaje=$porcentaje+15000;
    
}
$i++;
return $porcentaje;
}

    
 


    //to_string
    public function __toString(){
     $pasajeros=$this->mostrarPasajero();
     $objPasajeros=$this->getObjPasajero();
     $cantPasajero=count($objPasajeros);
     $pasajero="\n                ¡Información del Viaje!\n".
     "Destino: ".$this->getDestino()."\n".
     "Codigo Viaje: ".$this->getCodigoViaje()."\n".
     "Capacidad maxima de ocupantes: ".$this->getCantMaximaPasajeros()."\n".
     "Asientos ocupados: ".$cantPasajero."\n".
     "Costo total: ".$this->darPorcentajeIncremento()."\n".
     "\n                ¡Información Persona Responsable!".
     "\n".$this->getPersonaResp()."\n".
     "\n " .$pasajeros."\n";
     return $pasajero;
    }
}
