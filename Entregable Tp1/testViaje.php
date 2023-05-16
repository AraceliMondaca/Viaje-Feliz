<?php
//Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. */
require_once('Viaje.php');
require_once('ResponsableV.php');
require_once('Pasajero.php');
echo"/               Datos del Viaje                 / \n";
echo"Ingrese destino:\n";
$destino=trim(fgets(STDIN))."\n";
echo"Ingrese codigo del viaje:\n";
$codViaje=trim(fgets(STDIN))."\n";
echo "ingrese cantidad de pasajes totales:\n";
$cantidadAsientosMAX=trim(fgets(STDIN));

$objPasajero=new Pasajero('Pame','luna',3245326,29954637,20,012);
$objPersonaRes=new ResponsableV(0045,214700,'Luciano','Pereyra'); 
$objViaje= new Viaje($objPasajero->pasajeroPre(),$codViaje,$destino,$cantidadAsientosMAX,$objPersonaRes);
function menu()
{
      $menu= "--------------------Opciones-------------------\n".
     "opcion 1 Agregar pasajero:\n".
     "opcion 2 Modificar el destino del viaje:\n".
     "opcion 3 Modificar pasajero:\n".
     "opcion 4 Quitar pasajero:\n".
     "opcion 5 Modificar la cantidad de asientos del viaje:\n".
     "opcion 6 Modificar el codigo del viaje:\n".
     "opcion 7 Ver Viaje:\n".
     "opcion 8 Ver datos de Persona Responsable:\n".
     "opcion 9 Modificar datos de Persona Responsable:\n".
     "opcion 10 salir.\n".
     "--------------------Hasta pronto---------------\n";
     return $menu;

}


function recogerDatos(){
    echo"Nombre: ";
    $nombre=trim(fgets(STDIN))."\n";
    echo"Apellido: ";
    $apellido=trim(fgets(STDIN))."\n";
    echo"DNI: ";
    $dni=strval(trim(fgets(STDIN)))."\n";
    echo "Telefono: ";
    $telefono=trim(fgets(STDIN))."\n";
    echo "Numero de Asiento: ";
    $numeroAsiento=trim(fgets(STDIN))."\n";
    echo "Ticket: ";
    $Ticket=trim(fgets(STDIN))."\n";
    $pasajero=["nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono,"Asiento"=>$numeroAsiento,"ticket"=>$Ticket];
    return $pasajero;
}

$ejecucion=true;
do {
    print menu();
   $opc=trim(fgets(STDIN));
    switch ($opc) {
        case '1':
            if($objViaje->hayPasajesDisponible()){
                echo "Ingrese los datos de un pasajero: \n";
                $pasajero = recogerDatos();
                echo $objViaje->venderPasaje($pasajero);
               
            
            }else{
                echo "No hay mas lugare en este viaje.\n";
            }            
            break;
        
        case '2':
            echo "El viaje con destino a: {$objViaje->getDestino()}. \n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objViaje->setDestino($destino);
            break;
        
        case '3':
             echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = recogerDatos();
            echo "Ingrese los nuevos datos: \n";
            $otroPasajero = recogerDatos();
            echo $objViaje->cambiaDatosPasajeros($pasajero, $otroPasajero);
            break;
        
        case '4':
            echo "Ingrese los datos del pasajero a quitar: \n";
            $pasajero = recogerDatos();
            echo $objViaje->eliminarPasajero($pasajero);
            break;
        
        case '5':
            echo "El viaje posee {$objViaje->getCantMaximaPasajeros()} asientos. \n";
            echo "Ingrese la nueva cantidad de asientos: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $objViaje->setCantMaximaPasajeros($cantidadAsientos);
            break;
        
        case '6':
            echo "El viaje posee el código: {$objViaje->getCodigoViaje()}. \n";
            echo "Ingrese el nuevo código: \n";
            $codigo = trim(fgets(STDIN));
            $codigo = intval($codigo);
            $objViaje->setCodigoViaje($codigo);
            break;
        
        case '7':
            echo $objViaje->__toString();
            break;

        case '8':
            $ResponsableV=$objPersonaRes;
            echo $ResponsableV;
            break;

        case '9':
            echo "Modifique los datos del Responsable \n".
            "Numero de empleado: \n";
            $numEmpleado=trim(fgets(STDIN))."\n";
            echo"Ingrese numero de licencia: \n";
            $numLicencia=trim(fgets(STDIN))."\n";
            echo"Nombre responsable: \n";
            $nombre=trim(fgets(STDIN))."\n";
            echo"Apellido responsable: \n";
            $apellido=trim(fgets(STDIN))."\n";
            $ResponsableV=$objPersonaRes->setNumEmpleado($numEmpleado);
            $ResponsableV=$objPersonaRes->setNumLicencia($numLicencia);
            $ResponsableV=$objPersonaRes->setNombre($nombre);
            $ResponsableV=$objPersonaRes->setApellido($apellido);
            break;

        default:
        $ejecucion=false;
        break;
    }
} while ($ejecucion == true);
