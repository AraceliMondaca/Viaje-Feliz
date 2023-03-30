<?php

class Viaje
{
    private $codigoViaje;//int
    private $destino;//string
    private $cantidadPasajero=0;
    private $cantMaximaPasajeros;//int-6
    private $coleccionPasajeros=[];// nombre,apellido,DNI-8

    public function __construct($codigo, $destino,$cantMaximaDePasajeros)
    {
        $this->codigoViaje=$codigo;
        $this->destino=$destino;
        $this->cantMaximaPasajeros=$cantMaximaDePasajeros;
    
    }
//Metodos de acceso
    

    /**
     * Get the value of codigoViaje
     */ 
    public function getCodigoViaje()
    {
        return $this->codigoViaje;
    }

    /**
     * Set the value of codigoViaje
     *
     * @return  self
     */ 
    public function setCodigoViaje($codigoViaje)
    {
        $this->codigoViaje = $codigoViaje;

    }

    /**
     * Get the value of destino
     */ 
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set the value of destino
     *
     * @return  self
     */ 
    public function setDestino($destino)
    {
        $this->destino = $destino;

    }

    /**
     * Get the value of cantidadPasajero
     */ 
    public function getCantidadPasajero()
    {
        return $this->cantidadPasajero;
    }

    /**
     * Set the value of cantidadPasajero
     *
     * @return  self
     */ 
    public function setCantidadPasajero($cantidadPasajero)
    {
        $this->cantidadPasajero = $cantidadPasajero;

    }

    /**
     * Get the value of cantMaximaPasajeros
     */ 
    public function getCantMaximaPasajeros()
    {
        return $this->cantMaximaPasajeros;
    }

    /**
     * Set the value of cantMaximaPasajeros
     *
     * @return  self
     */ 
    public function setCantMaximaPasajeros($cantMaximaPasajeros)
    {
        $this->cantMaximaPasajeros = $cantMaximaPasajeros;

    }

    /**
     * Get the value of coleccionPasajeros
     */ 
    public function getColeccionPasajeros()
    {
        return $this->coleccionPasajeros;
    }

    /**
     * Set the value of coleccionPasajeros
     *
     * @return  self
     */ 
    public function setColeccionPasajeros($coleccionPasajeros)
    {
        $this->coleccionPasajeros = $coleccionPasajeros;

    }
    public function agregarPasajero($pasajero)
    {
        $psajero_="";
        if (in_array($pasajero,$this->getColeccionPasajeros())) {

            $psajero_="El pasajero:\n".$pasajero." tiene un asiento en el viaje\n";
        } else {
            
            array_push($this->coleccionPasajeros,$pasajero);
            $this->cantMaximaPasajeros+1;
            $psajero_="Usted a añadido correctamente un pasajero\n";
        }
        return $psajero_;
        
    }

    public function quedaLugar()
    {
        $res= true;
        if ($this->getCantMaximaPasajeros()<=(count($this->coleccionPasajeros))) {
            $res=false;
        }
        return $res;
    }
    public function eliminarPasajero($pasajero)
    {
        $psajero_="El pasajero no esta registrado en este viaje\n";
        if (in_array($pasajero,$this->getColeccionPasajeros())) {
            
            $key =array_search($pasajero, $this->coleccionPasajeros);
           
            array_splice($this->coleccionPasajeros,$key,1);
            $this->cantMaximaPasajeros-1;
            $psajero_="Pasajero borrado correctamente\n";
        }
        return $psajero_;
    }
    public function cambiaDatosPasajeros($pasajero, $otroPasajero)
    {
        $psajero_="El pasajero no existe en nuestros registros\n";
        if (in_array($pasajero,$this->getColeccionPasajeros())) {
            $key =array_search($pasajero, $this->getColeccionPasajeros());
            $this->coleccionPasajeros[$key]=$otroPasajero;
            $psajero_="El dato de a sido modificado\n";
        }
        return $psajero_;
    }
    public function mostrarPasajero()
    {
        $mostrarStrPasajero=[];
        $i=0;
foreach ($this->coleccionPasajeros as $key => $value) {
    $Nombre=$value["Nombre"];
    $Apellido=$value["Apellido"];
    $DNI=$value["DNI"];
    $mostrarStrPasajero[$i]=array("Nombre:"=>$Nombre,"Apellido:"=>$Apellido,"DNI:"=>$DNI);
    $i++;
}


        return print_r($mostrarStrPasajero);
    }

    //to_string
    public function __toString(){
     $pasajero="\n                Información del Viaje\n".
     "Destino: ".$this->getDestino()."\n".
     "Codigo Viaje: ".$this->getCodigoViaje()."\n".
     "Capacidad maxima de ocupantes: ".$this->getCantMaximaPasajeros()."\n".
     "Asientos ocupados: ".count($this->coleccionPasajeros)."\n".
     "\n " .$this->mostrarPasajero()."\n";
     return $pasajero;
    }
}
