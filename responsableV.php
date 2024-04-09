<?php 
    class responsableV{
        private $numEmpleado;
        private $numLicencia;
        private $nombre;
        private $apellido;

        // Constructor de la clase responsable
        public function __construct($empleado,$licencia,$name,$pApellido){
            $this->numEmpleado = $empleado;
            $this->numLicencia = $licencia;
            $this->nombre =  $name;
            $this->apellido = $pApellido;
        }

        // Metodos GET de la clase responsable
        public function getEmpleado(){
            return $this->numEmpleado;
        }

        public function getLicencia(){
            return $this->numLicencia;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getApellido(){
            return $this->apellido;
        }

        // Metodos SET de la clase responsable
        public function setEmpleado($empleado){
           $this->numEmpleado = $empleado;
        }

        public function setLicencia($licencia){
            $this-> numLicencia= $licencia;
        }

        public function setNombre($name){
            $this->nombre = $name;
        }

        public function setApellido($pApellido){
            $this->apellido = $pApellido;
        }

        // Metodos que muestran la informacion de la clase responsable
        public function __toString(){
            return "Numero empleado: ".$this->getEmpleado()."\n".
                    "Numero licencia: ".$this->getLicencia()."\n".
                    "Nombre: ".$this->getNombre()."\n".
                    "Apellido: ".$this->getApellido()."\n";
        }

        // Modifica la informacion del responsable
        public function modificarResponsable($empleado,$name,$pApellido){
            $this->setEmpleado($empleado);
            $this->setNombre($name);
            $this->setApellido($pApellido);
        }

    }