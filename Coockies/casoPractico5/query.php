<?php

include "db.php";

class query extends db {
    function _construct(){
        // de esta forma realizamos la conexion a la base de datos
        parent::__construct();
    }
    //devolvemos todos los partidos
    function insertarUsuarios($nombre,$apellidos,$email,$pass){
        //construimos la consulta
        $sql="INSERT INTO usuario (Nombre,apellidos,email,pass,rol) VALUES ('$nombre','$apellidos','$email','$pass','1')";
        //Realizamos la consulta
        $resultado = $this->realizarConsulta($sql);
     if($resultado !=null){
         //guardamos los equipos en un array llamado tabla
        return true;
     }else{
         return null;
     }
    }

     function sacarUsuario($email,$pass){
        $sql= "SELECT * FROM usuario where email='$email' AND pass = '$pass'";
         //Realizamos la consulta
         $resultado = $this->realizarConsulta($sql);
         if($resultado !=null){
             //guardamos los partidos en un array llamado tabla
             $tabla=[];
            
             while($fila=$resultado->fetch_assoc()){
                 $tabla[]=$fila;
             }
             return $tabla;
         }else{
             return null;
         }
    }


    function actualizarUsuario($email,$nombre,$apellidos,$rol){
       //construimos la consulta
       $sql="UPDATE usuario set nombre='$nombre',apellidos='$apellidos',rol='$rol' where email= '$email'";
       //Realizamos la consulta
       $resultado = $this->realizarConsulta($sql);
    if($resultado !=null){
        //guardamos los equipos en un array llamado tabla
       return true;
    }else{
        return null;
    }
   }

   function comprobarUsuario($email,$pass){
    $sql= "SELECT email FROM usuario where email='$email' AND pass = '$pass'";
     //Realizamos la consulta
     $resultado = $this->realizarConsulta($sql);
     if($resultado !=null){
        //guardamos los partidos en un array llamado tabla
        $tabla=[];
        while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
        }
        return $tabla;
    }else{
        
        return null;
    }


   }

   function comprobarMail($email){

    $sql= "SELECT email FROM usuario where email='$email'";
    //Realizamos la consulta
    $resultado = $this->realizarConsulta($sql);
    if($resultado !=null){
       //guardamos los partidos en un array llamado tabla
       $tabla=[];
       while($fila=$resultado->fetch_assoc()){
           $tabla[]=$fila;
       }
       return $tabla;
   }else{
       
       return null;
   }


  }

  public function seleccionarRol(){
    $sql="SELECT * FROM roles"; 
    $resultado = $this->realizarConsulta($sql);
    if ($resultado!=null){
        $tabla=[];
        while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
        }
      return $tabla;
    } else {
      return null;
    }
  }



    }

    ?>

