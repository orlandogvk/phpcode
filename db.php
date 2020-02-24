<?php
  session_start();
  /*
    Way 1
    $server="localhost";
   $user="root";
   $pwd="";
   $db="php_mysql_crud";
   $msg="No se ha encontrado el enlace con el servidor o la base de datos";
   $conexion = new mysqli($server,$user,$pwd,$db) or die ($msg);
   $acento=$conexion->query("SET NAMES 'utf8'");
   if(mysqli_connect_errno()){
    echo 'Conexion fallida : ', mysqli_connect_error();
    exit();
    }
    */
    //Way 2
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'php_mysql_crud'
    );
    /*
    if(isset($conn)){
        echo 'DB is connected';
    }
    */
?>
