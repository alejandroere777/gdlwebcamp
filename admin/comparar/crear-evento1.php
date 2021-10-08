<?php
include_once 'funciones/sesiones.php';  //SIEMPRE PRIMERO // agrego en toda pag q quiera tener segura
include_once 'funciones/funciones.php';
include_once 'template/header.php';
include_once 'template/barra.php';
include_once 'template/navegacion.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Crear Evento
            <small>completa el formulario</small>
        </h1>

    </section>

    <div class="row">
        <div class="col-md-8">


            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Evento</h3>
                    </div>
                    <div class="box-body">
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nombre_evento">Titulo Evento:</label>
                                    <input type="text" name="titulo_evento" class="form-control" id="titulo_evento" placeholder="Titulo Evento">
                                </div>


                                <div class="form-group">
                                    <label for="nombre">Categoria:</label>
                                    <select name="categoria_evento" class="form-control seleccionar">
                                        <option value="0">- Seleccionar -</option>
                                        <?php
                                        try {
                                            $sql = "SELECT * FROM categoria_evento ";
                                            $resultado = $conn->query($sql);
                                            while ($cat_evento = $resultado->fetch_assoc()) { ?>
                                                <!--agrego las opciones del select -->
                                                <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                                    <?php echo $cat_evento['cat_evento']; ?>
                                                </option>
                                        <?php }
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fecha Evento:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="fecha" name="fecha_evento">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <!-- time Picker -->
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Hora:</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control timepicker" name="hora_evento">

                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Invitado o Ponente:</label>
                                    <select name="invitado_evento" class="form-control seleccionar">
                                        <option value="0">- Seleccionar -</option>
                                        <?php
                                        try {
                                            $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                                            $resultado = $conn->query($sql);
                                            while ($invitados = $resultado->fetch_assoc()) { ?>
                                                <!--agrego las opciones del select -->
                                                <option value="<?php echo $invitados['invitado_id']; ?>">
                                                    <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                                </option>
                                        <?php }
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div><!-- /.box-body -->
                            

                            <div class="box-footer">
                                <input type="hidden" name="registro" value="nuevo">
                                <button type="submit" class="btn btn-primary" id="crear_registro">Aceptar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div> <!-- cierra row -->
</div>
    <!-- /.content-wrapper -->

    <?php
    include_once './template/footer.php';
  
    ?>
    