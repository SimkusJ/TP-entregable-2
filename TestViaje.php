<?php

require "Pasajero.php";
require "ResponsableV.php";
require "Viaje.php";





function AñadirResponsable($viaje){

    $responsable=$viaje->getResponsable();
    echo "Ingrese los datos de la persona resopnsable \n
    Nombre: \n";
    $responsable->setNombre(trim(fgets(STDIN)));
    echo "Ingrese apellido \n";
    $responsable->setApellido(trim(fgets(STDIN)));
    echo "Ingrese numero de empleado \n";
    $responsable->setNumEmpleado(trim(fgets(STDIN)));
    echo "Ingrese el numero de licencia \n";
    $responsable->setNumLicencia(trim(fgets(STDIN)));

    echo "== Se añadieron o remplazaron los datos del responsable == \n";
    
}

function añadirPasajero($viaje){

    if ($viaje->getmaxPasajeros() > count($viaje->getColeccionPasajeros())){

    $pasajero=new Pasajero("x", "x", 0000, 0000);

    echo "Ingrese el nombre \n";
    $pasajero->setNombre(trim(fgets(STDIN)));
    echo "Ingrese el apellido \n";
    $pasajero->setApellido(trim(fgets(STDIN)));
    echo "Ingrese el DNI \n";
    $pasajero->setNumDocumento(trim(fgets(STDIN)));
    echo "Ingrese el numero de telefono \n";
    $pasajero->setNumTelefono(trim(fgets(STDIN)));

    $comprobacion= $viaje->buscarPasajero($pasajero->getNumDocumento());

    if ($comprobacion===null){

    $viaje->archivarPasajero($pasajero);

    }else{
        echo "==== Los datos ingresados coinciden con un pasajero existente ==== \n";
    }

    }else{

        echo "==== No quedan mas asientos para el viaje ==== \n";

    }

}

function modificarPasajero($viaje){

    echo "Por favor ingrese el DNI del pasajero \n";
    $dni=trim(fgets(STDIN));

    $posicion=$viaje->buscarPasajero($dni);


    if ($posicion!==null){

        $collecion=$viaje->getColeccionPasajeros();
        $pasajero=$collecion[$posicion];
        echo "Ingrese los datos nuevamente\n 
        Nombre: \n";
        $pasajero->setNombre(trim(fgets(STDIN)));
        echo "Apellido: \n";
        $pasajero->setApellido(trim(fgets(STDIN)));
        echo "Numero de documento: \n";
        $pasajero->setNumDocumento(trim(fgets(STDIN)));
        echo "Numero de telefono: \n";
        $pasajero->setNumTelefono(trim(fgets(STDIN)));
        echo "Los datos del pasajero fueron modificados \n";

        
    }else{
        echo "==== No hay datos relacionados al DNI ==== \n";
    }

}

function quitarPasajero($viaje){

    echo "Ingrese el DNI del pasajero \n";
    $dni=trim(fgets(STDIN));

    $posicion=$viaje->buscarPasajero($dni);

    if ($posicion!==null){

        $viaje->eliminarPasajero($posicion);
        $viaje->ordenarArreglo();

    }else{
        echo "== No hay datos relacionados con el DNI == \n";
    }
}

function cargarDatosViaje ($viaje) {
            

    echo "Ingrese su destino \n";
    $destinoV=trim(fgets(STDIN));

    echo "Ingrese la cantidad maxima de personas para este viaje \n";
    $cantidadMaxima=trim(fgets(STDIN));
    while (!ctype_alnum($cantidadMaxima) or $cantidadMaxima >= 50 ) {
        echo "Valor ingresado no valido! vuelva a intentarlo! \n";
        $cantidadMaxima=trim(fgets(STDIN));
    }

    echo "Ingrese el codigo del viaje \n";
    $codigoDeViaje=trim(fgets(STDIN));

    $viaje->setmaxPasajeros($cantidadMaxima);
    $viaje->setCodigoViaje($codigoDeViaje);
    $viaje->setDestino($destinoV);
}



//Programa principal 





function menu (){


    // menu del programa

    $viaje= new Viaje(new ResponsableV( 00, 000, "nombrex", "apellidox" ), new Pasajero("x","n",00,000), 50,"sin Destino",0001);

    echo "\n 
    Bienvenido al menu del viaje! \n";


    do{
        echo "\n 
        1.Ingresar datos del viaje \n
        2.Ingresar datos del empleado responsable\n
        3.Añadir un pasajero \n
        4.Modificar datos de pasajero \n
        5.Eliminar pasajero \n
        6.Mostrar datos del viaje \n
        7.Salir \n";

        $opcion=trim(fgets(STDIN));

        switch($opcion){

            case 1:

                cargarDatosViaje($viaje);
                break;
            
            case 2:

                AñadirResponsable($viaje);
                break;
            
            case 3:

                añadirPasajero($viaje);
                break;
            
            case 4:

                modificarPasajero($viaje);
                break;
            
            case 5:
                
                quitarPasajero($viaje);
                break;

            case 6:

                echo $viaje;
                break;
            
            case 7:

                echo "\n Nos vemos en el proximo viaje! \n";
                break;
        }

    

    }while($opcion!=7);


}

menu();