<?php
//Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. */
require_once('Viaje.php');

echo"/               Datos del Viaje                 / \n";
echo"Ingrese destino:\n";
$destino=trim(fgets(STDIN))."\n";
echo"Ingrese codigo del viaje:\n";
$codViaje=trim(fgets(STDIN))."\n";
echo "ingrese cantidad de pasajes totales:\n";
$cantidadAsientosMAX=trim(fgets(STDIN));

$objViaje= new Viaje($codViaje,$destino,$cantidadAsientosMAX);
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
     "opcion 8 salir.\n".
     "--------------------Hasta pronto---------------\n";
     return $menu;

}


function recogerDatos()
{
    //convierte cualquier variable en cadena string
    echo"Nombre: ";
    $nombre=trim(fgets(STDIN))."\n";
    echo"Apellido: ";
    $apellido=trim(fgets(STDIN))."\n";
    echo"DNI: ";
    $dni=strval(trim(fgets(STDIN)))."\n";
    $pasajero=["Nombre"=>$nombre,"Apellido"=>$apellido,"DNI"=>$dni];
    return $pasajero;

}
$ejecucion=true;
do {
    print menu();
    $opc=trim(fgets(STDIN));
    switch ($opc) {
        case '1':
            if($objViaje->quedaLugar()){
                echo "Ingrese los datos de un pasajero: \n";
                $pasajero = recogerDatos();
                echo $objViaje->agregarPasajero($pasajero);
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
        
        default:
        $ejecucion=false;
        break;
    }
} while ($ejecucion == true);
