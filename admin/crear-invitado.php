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
            <h1>Crear Invitados
              <br>
              <small>Llena el Formulario para añadir un Invitado.</small>
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
              <h3 class="card-title">Crear Invitado</h3>

            </div>
            <div class="card-body">
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nombre_invitado">Nombre: </label>
                        <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre">
                      </div>

                      <div class="form-group">
                          <label for="apellido_invitado">Apellido: </label>
                          <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido">
                      </div>

                      <div class="form-group">
                          <label for="biografia_invitado">Biografía: </label>
                          <textarea class="form-control" id="biografia_invitado" name="biografia_invitado" rows="8" placeholder="Biografia"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="imagen_invitado">Imagen: </label>
                          <input class="form-control" type="file" id="imagen_invitado" name="archivo_imagen">

                          <p class="help-black">Añada la imagen del Invitado aqui.</p>
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


