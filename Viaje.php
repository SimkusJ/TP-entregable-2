<?php


class Viaje {

    //Atributos 

    private $destino;
    private $codigoViaje;
    private $responsable;
    private $pasajero;
    private $coleccionPasajeros;
    private $maxPasajeros;





    //Constructor 

    public function __construct($responsable ,$pasajeros, $maxPasajeros, $destino, $codigoViaje)
    {

        $this->responsable=$responsable;
        $this->pasajero=$pasajeros;
        $this->maxPasajeros=$maxPasajeros;
        $this->coleccionPasajeros= [];
        $this->destino=$destino;
        $this->codigoViaje=$codigoViaje;
      
    }


    //metodos, seteo y get de parametros //

    //Responsable 
    public function setResponsable($responsable){
        $this->responsable=$responsable;
    }
    public function getResponsable() {
        return $this->responsable;
    }


    // ----Pasajeros---- //
    public function setPasajero ($valor) {
        $this->pasajero=$valor;
    }
    public function getPasajero (){
        return $this->pasajero;
    }


    // ----maxPasajeros--- //
    public function setmaxPasajeros ($valor) {
        $this->maxPasajeros=$valor;
    }
    public function getmaxPasajeros () {
        return $this->maxPasajeros;
    }

    //collecion pasajeros
    public function setColeccionPasajeros($pasajero){
        $this->coleccionPasajeros=$pasajero;
    }
    public function getColeccionPasajeros(){
        return $this->coleccionPasajeros;
    }
    public function archivarPasajero($pasajero){
        //Su utilidad es guardar en un arreglo un objeto pasajero
        array_push($this->coleccionPasajeros, $pasajero);
    }

    // ----Destino---- //
    public function setDestino ($valor) {
        $this->destino=$valor;
    }
    public function getDestino () {
        return $this->destino;
    }


    // ---- coodigoViaje ---- //
    public function setCodigoViaje ($valor){
        $this->codigoViaje=$valor;
    }
    public function getCodigoViaje (){
        return $this->codigoViaje;
    }




    // ------------ funcion para eliminar un pasajero ------------//


        public function eliminarPasajero ($posicion){


            unset($this->coleccionPasajeros[$posicion]);

        }


        public function ordenarArreglo(){

            $this->coleccionPasajeros=array_values($this->coleccionPasajeros);
        }



        public function __toString () {


            //seccion del responsable

            $responsable= $this->getResponsable();

            $mensaje= "========== SECCION DEL RESPONSABLE ========== \n"; 
            $mensaje.= "Nombre: " .$responsable->getNombre(). "\n";
            $mensaje.= "Apellido: " .$responsable->getApellido(). "\n";
            $mensaje.= "Numero de empleado: " .$responsable->getNumEmpleado(). "\n";
            $mensaje.= "Numero de licencia: " .$responsable->getNumLicencia(). "\n";
            $mensaje.="============================================= \n";

            //Datos de viaje

            $mensaje.= "========== DATOS DEL VIAJE ========== \n";
            $mensaje.= "Destino del viaje: " .$this->getDestino(). "\n";
            $mensaje.= "Codigo del viaje: " .$this->getCodigoViaje(). "\n";
            $mensaje.= "Numero maximo de pasajeros: " .$this->getmaxPasajeros(). "\n";
            $mensaje.= "Cantidad actual de pasajeros: " .count($this->coleccionPasajeros). "\n";
            $mensaje.="============================================= \n";



            //seccion de los pasajeros
            
        $mensaje.= "========== SECCION DE PASAJEROS ========== \n";

        if (count($this->coleccionPasajeros) > 0) {

            $pasajeros= $this->getColeccionPasajeros();

           for($i=0; $i < count($this->coleccionPasajeros) ; $i++){


            $mensaje.= "========== Ubicacion en la lista: " .$i. "========== \n";
            $mensaje.= $pasajeros[$i] ."\n";


            }

        }else{

            $mensaje.="============================================= \n";
            $mensaje.= "No se cargo informacion sobre los pasajeros. \n";
            $mensaje.="============================================= \n";
        } 

        return $mensaje;

  
        }


        public function buscarPasajero($dni){


            $corte= false;
            $posicion=0;
            $index = null;


            if (count($this->getColeccionPasajeros()) > 0) {

                $collecion= $this->getColeccionPasajeros();

                while (!$corte && ($posicion < count($this->coleccionPasajeros))){

                        $pasajero=$collecion[$posicion];

                        if($pasajero->getNumDocumento()==$dni){
                            $corte=true;
                            $index=$posicion;
                        }
                        $posicion++;


                }

            }

            return $index;
        }

                



      
    }



