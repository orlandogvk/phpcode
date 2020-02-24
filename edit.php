<?php
      //Cargamos la base de datos
      include("db.php");

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query= "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        //Evaluamos si no existe el registro
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }


      }

        if(isset($_POST['update'])) {

          $id = $_GET['id'];
          $title = $_POST['title'];
          $description = $_POST['description'];

          $query = "UPDATE task set title ='$title', description = '$description' WHERE id = $id";
          mysqli_query($conn, $query);
          //Mensaje de confirmacion de actualizacion del registro
          $_SESSION['message'] = 'Task Updated Succesfully :D';
          $_SESSION['message_type'] = 'warning';
          //Redireccionamos hacia el inicio
          header("Location: index.php");
        }else{
            echo "Don't exist";
        }

 ?>

 <?php include("include/header.php") ?>
  <div class="container p-4">
      <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET["id"]; ?>" method="POST">
                          <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
                          </div>
                          <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description;?></textarea>
                          </div>
                          <button class="btn btn-success" name="update">
                               Update
                          </button>
                    </form>
                </div>
            </div>
      </div>
  </div>

  <?php include("include/footer.php") ?>
