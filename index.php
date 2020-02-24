<?php include("db.php")?>
<?php include("include/header.php")?>
  <div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!--Si existe el mensaje-->
      <?php if(isset($_SESSION['message'])) { ?>
        <!--Agregamos el color que configuramos en save_task.php-->
          <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <!--Se muestra el mensaje-->
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
      <?php session_unset(); } ?>     <!--Limpiamos los datos que tenemos en sesion-->
        <div class="card card-body">
            <form action="save_task.php" method="post">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
            </form>
        </div>
    </div>
    <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //Creamos la consulta
                    $query = "SELECT * FROM task";
                    //Ejecutamos la consulta para ir llenando la tabla
                    $result_tasks = mysqli_query($conn,$query);
                    //Recorremos las consultas para poder pintarlas en la tabla
                    while($row = mysqli_fetch_array($result_tasks)) { ?>
                      <tr>
                        <td><?php echo $row['title']?></td>
                        <td><?php echo $row['description']?></td>
                        <td><?php echo $row['created_at']?></td>
                        <td>
                          <!--Editamos cada fila por su id-->
                          <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                          <!--Eliminamos cada fila por su id-->
                          <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
  </div>
  </div>
<?php include("include/footer.php") ?>
