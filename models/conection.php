<?php
    /*
        Libreria PDO:

        ¿Que es?: 

            PDO es una clase propia de PHP, la cual nos facilita el proceso de coneccion y consulta a base de datos. En si PDO, no ejecuta las consulta, solo abstrae el procedimiento de contruccion, pero este requiere de un servicio (SGBD) para realizar dicha consulta

                Nota: El servidor es aquel que provee este servicio, la clase PDO Admite los siguientews servicios:

                    1. Cubird
                    2. Free TDS / Microsoft SQL Server / Sybase 
                    3. Firebird
                    4. IBM DB2
                    5. IBM Informix Dynamic Server
                    6. MySQL (3x - 4x - 5x) -> Coneccion por Defecto
                    7. Oracle Call Interface
                    8. ODBC v3
                    9. PostgreSQL
                    10. SQLite3 y SQLite2
                    11. Microsoft SQL Server / SQL Azure

            Es una clase propia de PHP que entrega una interfaz para facilitar la conexion y posterior consulta a bases de datos. PDO solo facilita el procedimiento pero por si solo no ejecuta la consulta, este requiere de un servicio detras para poder funcionar (Esto lo habilitamos desde las extensiones de xampp)    
    */

    /*
        ¿Como realizo la conexion? (Se recomienda usar variables externas y concatenarlas dentro de la consulta de coneccion):

        $direccion_host = 'direccion_host';
        $db_name = 'nombre_bd';
        $usuario = 'nombre_usuario';
        $contraseña = 'contraseña_usuario';

        $variable_conexion = new PDO ('servicio:host='.$direccion_host.';dbname='.$db_name.'',$usuario,$contraseña);

        Tip: Usar un try/catch con el fin de capturar posibles errores al momento de la coneccion a la base de datos
    */

    function DB_conection($host,$db_name,$user,$contraseña=''){

        //Intenta ejecutar una instancia de PDO, con x valores, en caso de ser exitosa, deberas retornar el objeto
        try{

            return new PDO ('mysql:host='.$host.';dbname='.$db_name.'',$user,$contraseña);

        //En caso de que la coneccion falle, el sistema debera guardar el codigo del error en una variable y luego retornarla como string
        }catch(PDOException $exception){
            
            /*

                PDOException: Esta es una clase creada para representar los errores de PDO, esta en si no es una clase nueva, ya que hereda los metodos de la clase RutineException

                    Propiedades Propias de la clase:

                        public (array) $errorInfo; -> Informacion del Error
                        protected (string) $code; -> Codigo del Error

                    Propiedades Heredadas:

                        protected (string) $message -> Descripcion o mensaje del error
                        protected (int) $code -> Codigo del Error Heredado
                        protected (string) $file -> Archivo donde se genero el error
                        protected (int) $line -> Linea de Codigo donde se genero el error

                    Metodos Heredados (Desde la Superclase Exception):

                        Tip: final -> Esta es una palabra clave, la cual impide que clases hijas puedan sobreescribir un metodo, el hacer uso del final evita que se pueda realizar la herencia de este metodo

                        final public Exception::getMessage() -> Esta funcion retorna el mensaje del error generado (En forma de String)

                        final public Exception::getPrevious() -> Esta funcion retorna la excepcion anterior

                        final public Exception::getCode() -> Esta funcion retorna el codigo del error (En forma ya sea de Objeto/Recurso/Arreglo/String/Entero/Flotante/Booleano/Nulo)

                        final public Exception::getFile() -> Esta funcion retorna la ruta del archivo que genero el error (En forma de String)

                        final public Exception::getLine() -> Esta funcion retorna el numero de la linea especifica que genero el error (En forma de Integer)

                        final public Exception::getTrace() -> Este metodo retorna toda la informacion del error (En forma de Arreglo)

                        final public Exception::getTraceAsString() -> Este metodo retorna toda la informacion del error (En forma de String concantenado)

                        public Exception::__toString() -> Este metodo es similar al metodo getTraceAsString, con la diferencia de que da informacion mucho mas detalla (En forma de String)

                        public Exception::__clone() -> Esta funcion clona la Excepcion lo cual generara un error Fatal

                RutineException: Esta clase lanza una excepcion si hay un error el cual unicamente puede ser encontrado en tiempo de ejecucion (No se sabe del error hasta que es ejecutado)

            */
            return $exception->getMessage();

        }

    }


?> 