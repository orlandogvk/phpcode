<?php

include("db.php");

if(isset($_POST['save_task'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  //Asignamos los valores del formulario a la base de datos por medio de la sentencia SQL
  $query = "INSERT INTO task(title, description) VALUE ('$title','$description')";
  //Realizo la consulta
  $result = mysqli_query($conn, $query);
  if(!$result){
    die("Query Failed");
  }

  //Boostrap alert
$_SESSION['message']='Task Saved succesfully :D';
//Color message
$_SESSION['message_type']='success';
  //Me redirecciona al index
  header("Location: index.php");
}
?>
