<?php
/*La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus 
viajes.
 De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los 
 pasajeros del viaje. Realice la implementación de la clase Viaje e implemente los métodos necesarios 
 para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y 
 arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su 
 “nombre”, “apellido” y “numero de documento”. Implementar un script testViaje.php que cree una instancia 
 de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus 
 datos.
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, 
apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos
 de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar 
 el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, 
 nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.
Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de
 los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
 De la misma forma cargue la información del responsable del viaje.*/

 
class viaje{
    private $codigoViaje;
    private $destinoViaje;
    private $maximoPasajeros;
    private $arrayPasajeros;
    private $objResponsable;

    // Metodo constructor de la clase viaje
    public function __construct($codigo,$destino,$cantMaxima, $responsable){
        $this->codigoViaje = $codigo;
        $this->destinoViaje = $destino;
        $this->maximoPasajeros = $cantMaxima;
        $this->arrayPasajeros = [];
        $this->objResponsable = $responsable;
    }

    // Metodos GET de la clase viaje
    public function getCodigo(){
        return $this->codigoViaje;
    }

    public function getDestino(){
        return $this->destinoViaje;
    }

    public function getCantidadMaxima(){
        return $this->maximoPasajeros;
    }

    public function getPasajeros(){
        return $this->arrayPasajeros;
    }

    public function getResponsable(){
        return $this->objResponsable;
    }

    // Metodos SET de la clase viaje
    public function setCodigo($codigo){
        $this->codigoViaje = $codigo;
    }

    public function setDestino($destino){
        $this->destinoViaje = $destino;
    }

    public function setCantidadMaxima($cantMaxima){
        $this->maximoPasajeros = $cantMaxima;
    }

    public function setPasajeros($pasajeros){
        $this->arrayPasajeros = $pasajeros;
    }

    public function setResponsable($responsable){
        $this->objResponsable = $responsable;
    }

    // Metodos que muestran la informacion de la clase viaje
    public function __toString(){
        return "Viaje Feliz :)\n".
               "Codigo de viaje: ".$this->getCodigo()."\n".
               "Destino: ".$this->getDestino()."\n".
               "Cantidad maxima de personas: ".$this->getCantidadMaxima()."\n".
               "Pasajeros: \n" .$this->mostrarPasajeros().
               "Responsable \n".$this->getResponsable();
    }


    // Metodo que muestra los pasajeros
    public function mostrarPasajeros(){
        $colPasajeros = $this->getPasajeros();
        $cadena = "";
        $nroPasajero = 0;
        for($i=0;$i<count($colPasajeros);$i++){
            $nroPasajero++;
            $pasajero = $colPasajeros[$i];
            $cadena = $cadena."Pasajero: ".$nroPasajero.":\n".$pasajero."\n";
        }
        return $cadena;
    }

    public function ingresaModificaPasajero($objInfoPasajero) {
        $dni = $objInfoPasajero->getDocumento();
        $nombrePasajero = $objInfoPasajero->getNombre();
        $apellidoPasajero = $objInfoPasajero->getApellido();
        $telefonoPasajero = $objInfoPasajero->getTelefono();
        $pasajeros = $this->getPasajeros();
        if($this->pasajeroYaCargado($dni)){
            $indiceModifica = $this->buscarPasajero($dni);
            $elPasajero = $pasajeros[$indiceModifica];
            $pasajeros[$indiceModifica] = $elPasajero;
            $this->setPasajeros($pasajeros);
        } else {
            $objPasajero = new pasajero($nombrePasajero,$apellidoPasajero,$dni,$telefonoPasajero);
            $pasajeros[]= $objPasajero;
            $this->setPasajeros($pasajeros);
        }



    }
    // Metodo que cuenta la cantidad de pasajeros
    public function cantPasajeros(){
        $cantPasajeros = count($this->getPasajeros());
        return $cantPasajeros;
    }


    // Metodo que busca a un pasajero
    public function buscarPasajero($documento){
        $arrPasajeros = $this->getPasajeros();
        $encontrado = false;
        $i = 0;
        while($i<$this->cantPasajeros() && !$encontrado){
            $unPasajero = $arrPasajeros[$i];
            if($unPasajero->getDocumento() == $documento){
                $encontrado = true;
            }else{
                $i++;
            }
        }
        if(!$encontrado){
            $i = -1;
        }
        return $i;
    }

    // Metodo que verifica si el pasajero se encuentra en el viaje
    public function pasajeroYaCargado($doc){
        if($this->buscarPasajero($doc) != -1){
            $pasajCargado = true;
        }else{
            $pasajCargado = false;
        }
        return $pasajCargado;
    }

    /**
     * $pasajero1["nombre"] = "alexis"
     * $pasajero1["nombre" => "alexis", "apellido" => "cifuentes", ...]*/

    // Modifica la informacion del viaje
    public function modificarViaje($codigo,$destino,$cantMaxima){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantidadmaxima($cantMaxima);
    }
}