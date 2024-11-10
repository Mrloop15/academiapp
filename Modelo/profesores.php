<?php

class Profesores{
    //Atributos(igual que los campos de la tabla)
    private $ProfesorID;
    private $Nombre;
    private $Apellido;
    private $Materia;
    private $Telefono;
    private $Correo;
    private $HoraDeAtencion;
    //Atributo de conectividad con la BD
    private $conexion;

    //Métodos
    //-Constructor
    public function _construct(){
        $this->ProfesorID="none";
        $this->Nombre="none";
        $this->Apellido="none";
        $this->Materia="none";
        $this->Telefono="none";
        $this->Correo="none";
        $this->HoraDeAtencion="none";
        
    }
    
    //Set's y Get's
    public function setProfesorID($ProfesorID){
        $this->ProfesorID = $ProfesorID;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    
    public function setApellido($Apellido){
        $this->Apellido = $Apellido;
    }

    public function setMateria($Materia){
        $this->Materia = $Materia;
    }
    
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }
    
    public function setCorreo($Correo){
        $this->Correo = $Correo;
    }

    public function setHoraDeAtencion($HoraDeAtencion){
        $this->HoraDeAtencion = $HoraDeAtencion;
    }
    

    public function getProfesorID(){
        return $this->ProfesorID;
    }
    
    public function getNombre(){
        return $this->Nombre;
    }
    
    public function getApellido(){
        return $this->Apellido;
    }

    public function getMateria(){
        return $this->Materia;
    }
    
    public function getTelefono(){
        return $this->Telefono;
    }
    
    public function getCorreo(){
        return $this->Correo;
    }

    public function getHoraDeAtencion(){
        return $this->HoraDeAtencion;
    }
    
    
    //Método para conectar a la tabla usuario de la BD
    private function EstableceConexion(){
        $this->conexion = mysqli_connect('127.0.0.1:3306','Danny','Mrloop15*r');
        
        if(!$this->conexion){
            echo "La conexion no se ha podido establecer.<br>";
        } else{
            mysqli_select_db($this->conexion,"academiapp");
        }
    }//EstableceConexion
    
    //Método para REGISTRAR información en la tabla alumnos
    public function registrarProfesor(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "INSERT INTO profesores (Nombre, Apellido, Materia, Telefono, Correo, HoraDeAtencion) values ('".$this->getNombre()."','".$this->getApellido()."','".$this->getMateria()."','".$this->getTelefono()."','".$this->getCorreo()."','".$this->getHoraDeAtencion()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Profesor registrado.<br>";
    }//registrarAlumno

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultarProfesores(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT * FROM profesores ORDER BY ProfesorID";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaAlumnos

    //Método para ACTUALIZAR información de la tabla alumnos
    public function actualizaProfesor(){
        //Evaluar que existan datos por actualizar
        if($this->getNombre() != ''){
            //1-Definir la instruccion SQL de actualización
            //update alumnos set nombre='María', apellidos='Gonzalez', promedio=9.3 where matricula=12345;
            $actualizar = "UPDATE profesores SET Nombre='".$this->getNombre()."', Apellido='".$this->getApellido()."', Materia='".$this->getMateria()."', Telefono='".$this->getTelefono()."', Correo='".$this->getCorreo()."', HoraDeAtencion='".$this->getHoraDeAtencion()."' WHERE Nombre='".$this->getNombre()."';";
            //echo $actualizar."<br>";

            //2-Establecer conexión con la BD
            $this->EstableceConexion();

            //3-Ejecutar la instrucción SQL en la conexion (BD)
            mysqli_query($this->conexion,$actualizar);

            //4-Cierro la conexión con la BD
            mysqli_close($this->conexion);

            //5-Mensaje informativo
            echo "Profesor modificado.";
        }else {
            echo "Sin definir profesor por actualizar.";
        }
        
    }//actualizaAlumno

    //Método para CONSULTAR(BUSQUEDA) alumno por MATRICULA
    public function BuscarProfesores(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT * from profesores WHERE Nombre='".$this->getNombre()."';";
        //echo $consulta."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaAlumnos

    //Método para BORRAR (cambiar status) información de la tabla alumnos
    public function borrarProfesor(){
        //1-Definir la instruccion SQL de consulta
        //update alumnos set estatus=2 where matricula=12345;
        $borrar = "DELETE FROM profesores WHERE Nombre='".$this->getNombre()."';";
        //print_r($borrar);
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();

        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$borrar);

        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);

        
        //5-Mensaje informativo
        echo "Profesor eliminado.";
    }//borrarAlumno
}