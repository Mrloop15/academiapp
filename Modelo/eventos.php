<?php

class Eventos{
    //Atributos(igual que los campos de la tabla)
    private $Titulo;
    private $FechaInicio;
    private $HoraEvento;
    private $Descripcion;
    private $Lugar;
    private $Organizador;
    //Atributo de conectividad con la BD
    private $conexion;

    //Métodos
    //-Constructor
    public function _construct(){
       $this->Titulo;
       $this->FechaInicio;
       $this->HoraEvento;
       $this->Descripcion;
       $this->Lugar;
       $this->Organizador;
    }
    
    //Set's y Get's
    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setFechaInicio($FechaInicio){
        $this->FechaInicio = $FechaInicio;
    }

    public function setHoraEvento($HoraEvento){
        $this->HoraEvento = $HoraEvento;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setLugar($Lugar){
        $this->Lugar = $Lugar;
    }

    public function setOrganizador($Organizador){
        $this->Organizador = $Organizador;
    }
    

    public function getTitulo(){
        return $this->Titulo;
    }

    public function getFechaInicio(){
        return $this->FechaInicio;
    }

    public function getHoraEvento(){
        return $this->HoraEvento;
    }
    
    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getLugar(){
        return $this->Lugar;
    }

    public function getOrganizador(){
        return $this->Organizador;
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
    public function registrarEvento(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "INSERT INTO eventos (Titulo, FechaInicio, HoraEvento, Descripcion, Lugar, Organizador) values ('".$this->getTitulo()."','".$this->getFechaInicio()."','".$this->getHoraEvento()."','".$this->getDescripcion()."','".$this->getLugar()."','".$this->getOrganizador()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Evento Registrado.<br>";
    }//registrarAlumno

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultarEventos(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT * FROM eventos ORDER BY FechaInicio";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        $resultado = mysqli_query($this->conexion,$consulta);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Retorna los datos de la consulta
        return $resultado;
    }//consultaAlumnos

    //Método para BUSCAR usuario por cuenta y contraseña
    public function buscarEvento(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT UserID, nombre, apellido, CorreoElectronico, UserName, Contrasena FROM usuario where UserName='".$this->getUserName()."';";
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
}