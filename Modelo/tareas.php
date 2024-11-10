<?php

class Tareas{
    //Atributos(igual que los campos de la tabla)
    private $TareaID;
    private $Titulo;
    private $NombreMateria;
    private $Descripcion;
    private $FechaEntrega;
    //Atributo de conectividad con la BD
    private $conexion;

    //Métodos
    //-Constructor
    public function _construct(){
        $this->TareaID="none";
        $this->Titulo="none";
        $this->Descripcion="none";
        $this->FechaEntrega="none";
    }
    
    //Set's y Get's
    public function setTareaID($TareaID){
        $this->TareaID = $TareaID;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setNombreMateria($NombreMateria){
        $this->NombreMateria = $NombreMateria;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

    public function setFechaEntrega($FechaEntrega){
        $this->FechaEntrega = $FechaEntrega;
    }
    

    public function getTareaID(){
        return $this->TareaID;
    }

    public function getTitulo(){
        return $this->Titulo;
    }

    public function getNombreMateria(){
        return $this->NombreMateria;
    }
    
    public function getDescripcion(){
        return $this->Descripcion;
    }

    public function getFechaEntrega(){
        return $this->FechaEntrega;
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
    public function registrarTarea(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "INSERT INTO tareas (Titulo, NombreMateria, Descripcion, FechaEntrega) values ('".$this->getTitulo()."','".$this->getNombreMateria()."','".$this->getDescripcion()."','".$this->getFechaEntrega()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Tarea Registrada.<br>";
    }//registrarAlumno

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultarTareas(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT * FROM tareas ORDER BY TareaID";
        
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