<?php

//Esta clase almacenrá la información proveniente del formulario, para posteriormente conectar a la BD y realizar la operación CRUD (agregar-C-, consultar-R-, actualizar-U- y eliminar-D)correspondiente

class Usuario{
    //Atributos(igual que los campos de la tabla)
    private $Nombre;
    private $Apellido;
    private $CorreoElectronico;
    private $UserName;
    private $Contrasena;
    //Atributo de conectividad con la BD
    private $conexion;
    
    //Métodos
    //-Constructor
    public function _construct(){
        $this->Nombre="none";
        $this->Apellido="none";
        $this->CorreoElectronico="none";
        $this->UserName="none";
        $this->Contrasena="none";
    }
    
    //Set's y Get's
    public function setNombre($nombre){
        $this->Nombre = $nombre;
    }
    
    public function setApellido($apellido){
        $this->Apellido = $apellido;
    }
    
    public function setCorreoElectronico($correoelectronico){
        $this->CorreoElectronico = $correoelectronico;
    }
    
    public function setUserName($username){
        $this->UserName = $username;
    }
    
    public function setContrasena($Contrasena){
        $this->Contrasena = $Contrasena;
    }
    
    public function getNombre(){
        return $this->Nombre;
    }
    
    public function getApellido(){
        return $this->Apellido;
    }
    
    public function getCorreoElectronico(){
        return $this->CorreoElectronico;
    }
    
    public function getUserName(){
        return $this->UserName;
    }
    
    public function getContrasena(){
        return $this->Contrasena;
    }
    
    //Método para conectar a la tabla usuario de la BD
    private function EstableceConexion(){
<<<<<<< HEAD
        $this->conexion = mysqli_connect('127.0.0.1:3306','adiaz','JF1HLewKzGn!nWxf');
=======
        //$this->conexion = mysqli_connect('127.0.0.1:8889','llopez','12345');
        $this->conexion = mysqli_connect('127.0.0.1:3306','remoto','Maizdorado69');
>>>>>>> ed5bedc7bcd680e5510cd0f769629a92ebdad600
        
        if(!$this->conexion){
            echo "La conexion no se ha podido establecer.<br>";
        } else{
            mysqli_select_db($this->conexion,"academiapp");
        }
    }//EstableceConexion
    
    //Método para REGISTRAR información en la tabla alumnos
    public function registrarUsuario(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "INSERT INTO usuario (Nombre, Apellido, CorreoElectronico, UserName, Contrasena) values ('".$this->getNombre()."','".$this->getApellido()."','".$this->getCorreoElectronico()."','".$this->getUserName()."','".$this->getContrasena()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Usuario registrado.<br>";
    }//registrarAlumno
    
    //Método para ACTUALIZAR información de la tabla alumnos
    public function actualizarUsuario(){
        //Evaluar que existan datos por actualizar
        if($this->getUserName() != 0){
            //1-Definir la instruccion SQL de actualización
            //update alumnos set nombre='María', apellidos='Gonzalez', promedio=9.3 where matricula=12345;
            $actualizar = "update usuario set nombre='".$this->getNombre()."', apellidos='".$this->getApellido();
            //echo $actualizar."<br>";

            //2-Establecer conexión con la BD
            $this->EstableceConexion();

            //3-Ejecutar la instrucción SQL en la conexion (BD)
            mysqli_query($this->conexion,$actualizar);

            //4-Cierro la conexión con la BD
            mysqli_close($this->conexion);

            //5-Mensaje informativo
            echo "Alumno modificado.";
        }else {
            echo "Sin definir matricula por actualizar.";
        }
        
    }//actualizaAlumno
    
    //Método para BUSCAR usuario por cuenta y contraseña
    public function buscarUsuario(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
<<<<<<< HEAD
        $consulta = "SELECT nombre, apellido, CorreoElectronico, UserName, Contrasena FROM usuario where UserName='".$this->getUserName()."';";
=======
        $consulta = "SELECT UserID, nombre, apellido, CorreoElectronico, UserName, Contrasena FROM usuario where UserName='".$this->getUserName()."';";
>>>>>>> ed5bedc7bcd680e5510cd0f769629a92ebdad600
        //echo $consulta."<br>";
        echo '<script>alert('.$consulta.')</script>';
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaAlumnos
    
    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultarUsuarios(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "select matricula, nombre, apellidos, promedio from alumnos where estatus = 1 order by apellidos";
        
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
    public function borrarUsuarios(){
        //1-Definir la instruccion SQL de consulta
        //update alumnos set estatus=2 where matricula=12345;
        $borrar = "update usuario set estatus = 2 where cuenta=".$this->getCuenta().";";
        //print_r($borrar);
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();

        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$borrar);

        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);

        //5-Mensaje informativo
        echo "Alumno dado de baja.";
    }//borrarAlumno
    
}//class
