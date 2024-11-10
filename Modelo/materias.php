<?php

class Materias{
    //Atributos(igual que los campos de la tabla)
    private $MateriaID;
    private $NombreMateria;
    private $FechaInicio;
    private $FechaFin;
    private $HoraClase;
    private $Descripcion;
    private $Profesor;  
    //Atributo de conectividad con la BD
    private $conexion;

    //Métodos
    //-Constructor
    public function _construct(){
        $this->MateriaID="none";
        $this->NombreMateria="none";
        $this->FechaInicio="none";
        $this->FechaFin="none";
        $this->HoraClase="none";
        $this->Descripcion="none";
        $this->Profesor="none";
    }
    
    //Set's y Get's

    public function setMateriaID($MateriaID){
        $this->MateriaID = $MateriaID;
    }

    public function getMateriaID(){
        return $this->MateriaID;
    }
   
    public function setNombreMateria($NombreMateria){
      $this->NombreMateria = $NombreMateria;
    }

    public function getNombreMateria(){
      return $this->NombreMateria;
    }

    public function setFechaInicio($FechaInicio){
      $this->FechaInicio = $FechaInicio;
    }
    
    public function getFechaInicio(){
      return $this->FechaInicio;
    }

    
    public function setFechaFin($FechaFin){
      $this->FechaFin = $FechaFin;
    }
    
    public function getFechaFin(){
      return $this->FechaFin;
    }

    public function setHoraClase($HoraClase){
      $this->HoraClase = $HoraClase;
    }

    public function getHoraClase(){
      return $this->HoraClase;
    }

    public function setDescripcion($Descripcion){
      $this->Descripcion = $Descripcion;
    }

    public function getDescripcion(){
      return $this->Descripcion;
    }

    public function setProfesor($Profesor){
      $this->Profesor = $Profesor;
    }

    public function getProfesor(){
      return $this->Profesor;
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
    public function registrarMateria(){
        //1-Definir la instruccion SQL de inserción
        //insert into alumnos (matricula, nombre, apellidos, promedio, estatus) values (12345,'Luis','Lopez',8.2, 1);
        $registrar = "INSERT INTO materias (MateriaID, NombreMateria, FechaInicio, FechaFin, HoraClase, Descripcion, Profesor) values ('".$this->getMateriaID()."','".$this->getNombreMateria()."','".$this->getFechaInicio()."','".$this->getFechaFin()."','".$this->getHoraClase()."','".$this->getDescripcion()."','".$this->getProfesor()."');";
        //echo $registrar."<br>";
        
        //2-Establecer conexión con la BD
        $this->EstableceConexion();
        
        //3-Ejecutar la instrucción SQL en la conexion (BD)
        mysqli_query($this->conexion,$registrar);
        
        //4-Cierro la conexión con la BD
        mysqli_close($this->conexion);
        
        //5-Mensaje informativo
        echo "Materia Registrada.<br>";
    }//registrarAlumno

    //Método para CONSULTAR TODOS los registros de la tabla
    public function consultarMaterias(){
        //1-Definir la instruccion SQL de consulta
        //select * from alumnos order by apellidos;
        $consulta = "SELECT * FROM materias ORDER BY MateriaID";
        
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
     public function actualizaMateria(){
      //Evaluar que existan datos por actualizar
      if($this->getMateriaID() != ''){
          //1-Definir la instruccion SQL de actualización
          //update alumnos set nombre='María', apellidos='Gonzalez', promedio=9.3 where matricula=12345;
          $actualizar = "UPDATE materias SET MateriaID='".$this->getMateriaID()."', NombreMateria='".$this->getNombreMateria()."', FechaInicio='".$this->getFechaInicio()."', FechaFin='".$this->getFechaFin()."', HoraClase='".$this->getHoraClase()."', Descripcion='".$this->getDescripcion()."' WHERE MateriaID='".$this->getMateriaID()."';";
          //echo $actualizar."<br>";

          //2-Establecer conexión con la BD
          $this->EstableceConexion();

          //3-Ejecutar la instrucción SQL en la conexion (BD)
          mysqli_query($this->conexion,$actualizar);

          //4-Cierro la conexión con la BD
          mysqli_close($this->conexion);

          //5-Mensaje informativo
          echo "Materia Modificada.";
      }else {
          echo "Sin definir materia por actualizar.";
      }
      
  }//actualizaMateria

  public function BuscarMaterias(){
    //1-Definir la instruccion SQL de consulta
    //select * from alumnos order by apellidos;
    $consulta = "SELECT * from materias WHERE NombreMateria='".$this->getNombreMateria()."';";
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
 public function borrarMateria(){
  //1-Definir la instruccion SQL de consulta
  //update alumnos set estatus=2 where matricula=12345;
  $borrar = "DELETE FROM materias WHERE NombreMateria='".$this->getNombreMateria()."';";
  //print_r($borrar);
  
  //2-Establecer conexión con la BD
  $this->EstableceConexion();

  //3-Ejecutar la instrucción SQL en la conexion (BD)
  mysqli_query($this->conexion,$borrar);

  //4-Cierro la conexión con la BD
  mysqli_close($this->conexion);

  //5-Mensaje informativo
  echo "Materia eliminado.";
}//borrarAlumno
}