<?php


class Pasajero {



    //seccion de atributos o instancias

    private $nombre;
    private $apellido;
    private $numDocumento;
    private $numTelefono;

    //seccion de contruccion

    public function __construct($nombre, $apellido, $numDocumento, $numTelefono)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->numDocumento=$numDocumento;
        $this->numTelefono=$numTelefono;

    }


    // seccion de metodos o comportamiento 

    //Nombre
    public function setNombre ($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre (){
        return $this->nombre;
    }

    //Apellido
    public function setApellido ($apellido){
        $this->apellido=$apellido;
    }
    public function getApellido (){
        return $this->apellido;
    }

    //numero de documento
    public function setNumDocumento ($numero){
        $this->numDocumento=$numero;
    }
    public function getNumDocumento (){
        return $this->numDocumento;
    }

    //numero de telefono
    public function setNumTelefono ($num){
        $this->numTelefono=$num;
    }
    public function getNumTelefono () {
        return $this->numTelefono;
    }


    // tooString
    public function __toString()
    {
        $mensaje="========== Pasajero ========== \n";
        $mensaje.= "Nombre: " .$this->getNombre(). "\n" ;
        $mensaje.="Apellido: " .$this->getApellido(). "\n";
        $mensaje.="DNI: " .$this->getNumDocumento(). "\n";
        $mensaje.="Telefono: " .$this->getNumTelefono(). "\n";   
        $mensaje.="===================================== \n";

        return $mensaje;
    }
    
}