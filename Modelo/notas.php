<?php

class Notas{
    //Atributos(igual que los campos de la tabla)
    private $NotaID;
    private $Titulo;
    private $Nota;
    //Atributo de conectividad con la BD
    private $conexion;

    //Métodos
    //-Constructor
    public function _construct(){
        $this->NotaID="none";
        $this->Titulo="none";
        $this->Nota="none";
    }
    
    //Set's y Get's
    public function setNotaID($NotaID){
        $this->NotaID = $NotaID;
    }

    public function setTitulo($Titulo){
        $this->Titulo = $Titulo;
    }

    public function setNota($Nota){
        $this->Nota = $Nota;
    }
    

    public function getNotaID(){
        return $this->NotaID;
    }

    public function getTitulo(){
        return $this->Titulo;
    }

    public function getNota(){
        return $this->Nota;
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
    public function registrarNotas(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "INSERT INTO notas (Titulo, Nota) values ('".$this->getTitulo()."','".$this->getNota()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Nota Registrada.<br>";
    }//registrarAlumno

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultarNotas(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT * FROM notas ORDER BY NotaID";
        
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