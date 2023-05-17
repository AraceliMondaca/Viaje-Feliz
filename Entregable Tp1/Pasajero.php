<?php 
class Pasajero{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numeroAsiento;
    private $numTicket;
    public function __construct($nombre,$apellido,$documento,$telefono,$numeroAsiento,$numTicket){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->documento=$documento;
        $this->telefono=$telefono;
        $this-> numeroAsiento=$numeroAsiento;
        $this-> numTicket=$numTicket;
        $colPasajero=["nombre"=>$nombre,"apellido"=>$apellido,"documento"=>$documento,"telefono"=>$telefono,"Asiento"=>$numeroAsiento,"ticket"=>$numTicket];

    }
   
  
     public function getNombre() {
         return $this->nombre;
      }
     public function getApellido() {
         return $this->apellido;
      }
      public function getDocumento() {
         return $this->documento;
      }
      public function getTelefono() {
         return $this->telefono;
    }
      public function setNombre($nombre) {
        $this->nombre=$nombre;
    }
    public function setApellido($apellido) {
       $this->apellido=$apellido;
   }
   public function setDocumento($documento) {
       $this->documento=$documento;
   }
   public function setTelefono($telefono) {
       $this->telefono=$telefono;
   }

   public function getNumeroAsiento(){
    return $this->numeroAsiento;
   }
   public function setNumeroAsiento($numeroAsiento){
    $this->numeroAsiento=$numeroAsiento;
   }

   public function getNumTicket(){
    return $this->numTicket;
   }
   public function setNumTicket($numTicket){
    $this->numTicket=$numTicket;
   }

// moverlo a Viaje usando el agregarpasajero, no usar echo en las clases solo el test y mi arreglo debe estar en el test 
//y esta funcion debe tomar los parametros del test e ir agregando los pasajaros
public function pasajeroPre(){
    $nombre=$this->getNombre();
    $apellido=$this->getApellido();
    $dni=$this->getDocumento();
    $telefono=$this->getTelefono();
    $asiento=$this->getNumeroAsiento();
    $ticket=$this->getNumTicket();

    $colPasajero=array();
    $i=count($colPasajero);
    $colPasajero[$i]=array("nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono,"asiento"=>$asiento,"ticket"=>$ticket);
          for ($i=0; $i <count($colPasajero) ; $i++){ 
                    $colPasajero[$i];
                     }
                    return $colPasajero ;
}

   public function __stoString() {
      $persona="";
       $persona="Nombre: ".$this->getNombre().
       "\n Apellido: ".$this->getApellido(). 
       "\n DNI: ".$this->getDocumento().
       "\n Telefono: ".$this->getTelefono().
       "\n Numero de Asiento :".$this->getNumeroAsiento().
       "\n Numero de Ticket: ".$this->getNumTicket();
       return $persona;
       }
}
?>