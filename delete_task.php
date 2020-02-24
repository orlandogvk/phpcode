<?php
      include("db.php");

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query="DELETE FROM task WHERE id=$id";
        $result = mysqli_query($conn,$query);
        //Evaluamos si no existe el registro
        if(!$result){
          die("Query failed");
        }
        //Mensaje de confirmacion de eliminacion del registro
        $_SESSION['message'] = 'Task Removed Succesfully :D';
        $_SESSION['message_type'] = 'danger';
        //Redireccionamos hacia el inicio
        header("Location: index.php");
      }

 ?>
