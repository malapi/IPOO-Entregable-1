<?php 
    include_once 'pasajero.php';
    include_once 'viaje.php';
    include_once 'responsableV.php';

    // Muestra el menu donde se interactua con el usuario
    function menuPrincipal(){
        echo " ____________________________________________________________________________\n";
        echo "|                                Menu Principal:                             |\n";
        echo "|                       1) Cargar informacion del viaje                      |\n";
        echo "|                     2) Modificar informacion del viaje                     |\n";
        echo "|                         3) Ver informacion del viaje                       |\n";
        echo "|                                 4) Salir                                   |\n";
        echo "|____________________________________________________________________________|\n";
        $opc = trim(fgets(STDIN));
        echo "\n";

        return $opc;
    }

    // Menu que se muestra cuando el usuario elige la opcion 2 de la funcion menuPrincipal
    function menu_Modificacion_viaje(){
        echo " ____________________________________________________________________________\n";
        echo "|                        ¿Que desea modificar del viaje?                     |\n";
        echo "|                                 1) El codigo                               |\n";
        echo "|                                 2) El destino                              |\n";
        echo "|                      3) La capacidad maxima de pasajeros                   |\n";
        echo "|____________________________________________________________________________|\n";
        $opc2 = trim(fgets(STDIN));
        echo "\n";

        return $opc2;
    }

    // Menu que se muestra cuando el usuario elige la opcion 4 de la funcion menu_ModifInfo_pasajero
    function menu_ModifInfo_pasajero(){
        echo " ____________________________________________________________________________\n";
        echo "|                ¿Que informacion del pasajero desea modificar?              |\n";
        echo "|                                1) El Nombre                                |\n";
        echo "|                               2) El Apellido                               |\n";
        echo "|                               3) El Telefono                               |\n";
        echo "|                             4) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc3 = trim(fgets(STDIN));
        echo "\n";

        return $opc3;
    }

    // Menu que se muestra cuando el usuario elige la opcion 5 de la funcion menu_ModifInfo_responsable
    function menu_ModifInfo_responsable(){
        echo " ____________________________________________________________________________\n";
        echo "|               ¿Que informacion del responsable desea modificar?            |\n";
        echo "|                             1) Numero empleado                             |\n";
        echo "|                                 2) Nombre                                  |\n";
        echo "|                                3) Apellido                                 |\n";
        echo "|                             4) Todos sus datos                             |\n";
        echo "|____________________________________________________________________________|\n";
        $opc3 = trim(fgets(STDIN));
        echo "\n";

        return $opc3;
    }
    
    // Funcion que carga los datos del viaje
   
    // Funcion que carga los datos de los pasajeros
    

    function solicitarDatosPasajero(){
        $ingreso = "s";
        echo "Informacion del pasajero\n";
        echo "Ingrese el nombre del pasajero:\n";
        $nombrePasajero = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero:\n";
        $apellidoPasajero = trim(fgets(STDIN));
        echo "Ingrese el dni del pasajero:\n";
        $dniPasajero = trim(fgets(STDIN));
        echo "Ingrese el telefono del pasajero:\n";
        $telefonoPasajero = trim(fgets(STDIN));
        $posiblePasajero = new pasajero($nombrePasajero,$apellidoPasajero,$dniPasajero,$telefonoPasajero);
        return $posiblePasajero;
    }
    
    // Funcion que modifica los datos del viaje
    function modificarViaje($elViaje,$eleccion){
        switch($eleccion){
            case 1:
                echo "Codigo actual: ".$elViaje->getCodigo()."\n";
                echo "Ingrese el nuevo codigo para cambiarlo:\n";
                $nCodigo = trim(fgets(STDIN));
                $elViaje->setCodigo($nCodigo);
                echo "El codigo se cambio correctamente\n";
            break;
            case 2:
                echo "Destino actual: ".$elViaje->getDestino()."\n";
                echo "Ingrese el nuevo destino para cambiarlo:\n";
                $nDestino = trim(fgets(STDIN));
                $elViaje->setDestino($nDestino);
                echo "El destino se cambio correctamente\n";
            break;
            case 3:
                echo "Capacidad maxima actual: ".$elViaje->getCantidadMaxima()."\n";
                echo "Ingrese la nueva capacidad maxima para cambiarla:\n";
                $nCapacidadMaxima = trim(fgets(STDIN));
                $elViaje->setCantidadMaxima($nCapacidadMaxima);
                echo "La capacidad maxima se cambio correctamente\n";
            break;
        }

    }

   
    function modificarInfoUnPasajero($elViaje){
        $pasajeros = $elViaje->getPasajeros();
        echo "En el viaje hay ".count($elViaje->getPasajeros())." pasajeros\n";
        echo $elViaje->mostrarPasajeros();
        echo "Ingrese el dni del pasajero que quiere modificar su informacion:\n";
        $dniPasajero = trim(fgets(STDIN));
        $aPasajero = $elViaje->buscarPasajero($dniPasajero);
        $unPasajero = null;
        if($aPasajero != -1){
            $unPasajero = $pasajeros[$aPasajero];
            switch(menu_ModifInfo_pasajero()){
                case 1:
                    echo $unPasajero->getNombre() . " es el nombre actual \n";
                    echo "Se cambiara a: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    $unPasajero->setNombre($nuevoNombre);
                    echo "Se cambio correctamente a " . $unPasajero->getNombre() . "\n";
                break;
                case 2:
                    echo $unPasajero->getApellido() . " es el apellido actual \n";
                    echo "Se cambiara a: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    $unPasajero->setApellido($nuevoApellido);
                    echo "Se cambio correctamente a " . $unPasajero->getApellido() . "\n";
                break;
                case 3:
                    echo $unPasajero->getTelefono() . " es el telefono actual \n";
                    echo "Se cambiara a: ";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $unPasajero->setTelefono($nuevoTelefono);
                    echo "Se cambio correctamente a " . $unPasajero->getTelefono() . "\n";
                break;
                case 4:
                    echo $unPasajero->getNombre() . " es el nombre actual \n";
                    echo "Se cambiara a: ";
                    $nuevoNombre = trim(fgets(STDIN));
                    echo $unPasajero->getApellido() . " es el apellido actual \n";
                    echo "Se cambiara a: ";
                    $nuevoApellido = trim(fgets(STDIN));
                    echo $unPasajero->getTelefono() . " es el telefono actual \n";
                    echo "Se cambiara a: ";
                    $nuevoTelefono = trim(fgets(STDIN));
                    echo "\nSe cambiaron correctamente los datos!! \n";
                break;
                default:
                    echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 4) \n";
                break;
            }
        }else{
        echo "No existe un pasajero con ese nro de documento!! \n";
        }   
        return $unPasajero;   
    }
    // Funcion que modifica la informacion del responsable
    function modificarInfoResponsable($elViaje){
        $responsable = $elViaje->getResponsable();
        switch(menu_ModifInfo_responsable()){
            case 1:
                echo $responsable->getEmpleado() . " es el numero de empleado \n";
                echo "Se cambiara a: ";
                $nuevoNumEmpleado = trim(fgets(STDIN));
                $responsable->setEmpleado($nuevoNumEmpleado);
                echo "Se cambio correctamente a " . $responsable->getEmpleado() . "\n";
            break;
            case 2:
                echo $responsable->getNombre() . " es el nombre \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                $responsable->setNombre($nuevoNombre);
                echo "Se cambio correctamente a " . $responsable->getNombre() . "\n";
            break;
            case 3:
                echo $responsable->getApellido() . " es el apellido \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->setApellido($nuevoApellido);
                echo "Se cambio correctamente a " . $responsable->getApellido() . "\n";
            break;
            case 4:
                echo $responsable->getEmpleado() . " es el numero de empleado \n";
                echo "Se cambiara a: ";
                $nuevoNumEmpleado = trim(fgets(STDIN));
                echo $responsable->getNombre() . " es el nombre \n";
                echo "Se cambiara a: ";
                $nuevoNombre = trim(fgets(STDIN));
                echo $responsable->getApellido() . " es el apellido \n";
                echo "Se cambiara a: ";
                $nuevoApellido = trim(fgets(STDIN));
                $responsable->modificarResponsable($nuevoNumEmpleado,$nuevoNombre,$nuevoApellido);
                echo "Se cambiaron correctamente los datos \n";
            break;
            default:
                echo "OPCION INCORRECTA (Ingrese opcion valida 1 al 4) \n";
            break;
        }
    }
    $responsable = new responsableV("456","123","MaLa","Nota");
    $objViaje = new viaje("8","San Martin",10,$responsable);

    //Modificar Datos del viaje
    $opcion2 = menu_Modificacion_viaje();
    modificarViaje($objViaje,$opcion2);

    //Modificar Infor del REsponsable
    //modificarInfoResponsable($objViaje);
    
    //Cargar Pasajero
    /*$posiblePasajero = solicitarDatosPasajero();
    $objViaje->ingresaModificaPasajero($posiblePasajero); */
    echo "-------------------------------------------\n";
    echo $objViaje;
    echo "-------------------------------------------\n";
    
    //Modificar Pasajer
    /*$posiblePasajero = modificarInfoUnPasajero($objViaje);
    if($posiblePasajero != null) {
        $objViaje->ingresaModificaPasajero($posiblePasajero);
        echo "-------------------------------------------\n";
        echo $objViaje;
        echo "-------------------------------------------\n";
    }*/
    