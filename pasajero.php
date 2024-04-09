<?php
    class pasajero{
        private $nombrePasajero;
        private $apellidoPasajero;
        private $documento;
        private $telefono;

        // Constructor de la clase pasajero
        public function __construct($nombre,$apellido,$dni,$phone){
            $this->nombrePasajero = $nombre;
            $this->apellidoPasajero = $apellido;
            $this->documento = $dni;
            $this->telefono = $phone;
        }

        // Metodos GET de la clase pasajero
        public function getNombre(){
            return $this->nombrePasajero;
        }

        public function getApellido(){
            return $this->apellidoPasajero;
        }

        public function getDocumento(){
            return $this->documento;
        }

        public function getTelefono(){
            return $this->telefono;
        }


        // Metodos SET de la clase pasajero
        public function setNombre($nombre){
            $this->nombrePasajero = $nombre;
        }

        public function setApellido($apellido){
            $this->apellidoPasajero = $apellido;
        }

        public function setDocumento($dni){
            $this->documento = $dni;
        }

        public function setTelefono($phone){
            $this->telefono = $phone;
        }

        // Modifica la informacion del pasajero
        public function modificarPasajero($nombre,$apellido,$phone){
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setTelefono($phone);
        }

        // Metodos que muestran la informacion de la clase pasajero
        public function __toString(){
            return "Nombre: ".$this->getNombre()."\n".
                    "Apellido: ".$this->getApellido()."\n".
                    "Documento: ".$this->getDocumento()."\n".
                    "Telefono: ".$this->getTelefono();
        }

    }