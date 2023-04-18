<?php 
class Pasajero{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
 
    public function __construct($nombre,$apellido,$documento,$telefono){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->documento=$documento;
        $this->telefono=$telefono;
        $colPasajero=["nombre"=>$nombre,"apellido"=>$apellido,"documento"=>$documento,"telefono"=>$telefono];

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


public function pasajeroPre(){
    $nombre=$this->getNombre();
    $apellido=$this->getApellido();
    $dni=$this->getDocumento();
    $telefono=$this->getTelefono();
    $colPasajero=array();
    $colPasajero[0]=array("nombre"=>"Franco","apellido"=>"Escamilla","DNI"=>38465189,"telefono"=>44785632);
    $i=count($colPasajero);
    $colPasajero[$i]=array("nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono);
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
       "\n Telefono: ".$this->getTelefono(); 
       return $persona;
       }
}
?>