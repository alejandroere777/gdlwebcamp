<?php
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php';
  include_once 'templates/navegacion.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Categoria de Eventos
              <br>
              <small>Llena el Formulario para crear Categorias de Eventos.</small>
            </h1>
          </div>
          <div class="col-sm-6">
                      
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-8">

     

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Crear Categoria</h3>

            </div>
            <div class="card-body">
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="usuario">Nombre: </label>
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoria">
                      </div>
                      <div class="form-group">
                        <label for="">Icono:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text h-100 selected-icon"></span>
                            </div>
                             <input type="text" class="form-control iconpicker" name="icono" icono="fa fa-pie-chart" placeholder="Selecciona el Icono">
                        </div>
                    </div>
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <input type="hidden" name="registro" value="nuevo">
                      <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
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


