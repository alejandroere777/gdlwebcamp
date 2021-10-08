<?php
  include_once 'funciones/sesiones.php';
  include_once 'templates/header.php';
  include_once 'funciones/funciones.php';
  
  $id = $_GET['id'];
  if(!filter_var($id, FILTER_VALIDATE_INT)){
      die("Error");
  }
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header -Page header- -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Categoria de Eventos
              <br>
              <small>Puedes editar las Categorias de Eventos.</small>
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- <div class="row"> -->
    <div>
      <div class="col-md-8">
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Editar Categorias</h3>

            </div>
            <div class="card-body">
            <?php
                $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                $resultado = $conn->query($sql);
                $categoria = $resultado->fetch_assoc();

            ?> 

            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                      <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoría" value="<?php echo $categoria['cat_evento']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Icono:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text h-100 selected-icon"></span>
                            </div>
                             <input type="text" class="form-control iconpicker" name="icono" icono="fa fa-pie-chart" placeholder="fa-icon" value="<?php echo $categoria['icono']; ?>">
                        </div>
                     
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <input type="hidden" name="registro" value="actualizar">
                      <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                      <button type="submit" class="btn btn-primary" id="">Guardar</button>
                    </div>
                  </form>
            </div>
            <!-- /.card-body -->
          
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->

      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

<?php
  include_once 'templates/footer.php';
?>


