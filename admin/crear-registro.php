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
          <h1>Crear Registros
            <br>
            <small>Llena el Formulario para crear un registro.</small>
          </h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row">
    <div class="col-md-9">



      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Crear Registro</h3>

          </div>
          <div class="card-body">
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_registrado">Nombre: </label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>

                <div class="form-group">
                  <label for="apellido_registrado">Apellido: </label>
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                </div>

                <div class="form-group">
                  <label for="email">E-mail: </label>
                  <input type="mail" class="form-control" id="email" name="apellido" placeholder="Email">
                </div>

                <div class="form-group">
                  <!---->
                  <div id="paquetes" class="paquetes">
                  <div class="box-header with-border">
                    <h3 class="box-title">Elije el Número de Boletos</h3>
                  </div>

                    <ul class="lista-precios clearfix row">
                      <li class="col-md-4">
                        <div class="tabla-precio text-center">
                          <h3>Pase por Día (viernes)</h3>
                          <p class="numero">$30</p>
                          <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                          </ul>

                          <div class="orden">
                            <label for="pase_dia">Boletos deseados:</label>
                            <input type="number" class="form-control" min="0" id="pase_dia" size="3" name="boletos[]" placeholder="0">
                          </div>
                        </div>
                      </li>

                      <li  class="col-md-4">
                        <div class="tabla-precio text-center">
                          <h3>Todos los Días</h3>
                          <p class="numero">$50</p>
                          <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                          </ul>

                          <div class="orden">
                            <label for="pase_completo">Boletos deseados:</label>
                            <input type="number" min="0" id="pase_completo" size="3" name="boletos[]" placeholder="0">
                          </div>

                        </div>
                      </li>

                      <li  class="col-md-4">
                        <div class="tabla-precio text-center">
                          <h3>Pase por 2 Días (viernes y sábado)</h3>
                          <p class="numero">$45</p>
                          <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>

                            <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                            <li><i class="fas fa-check"></i>Todos los Talleres</li>
                          </ul>


                          <div class="orden">
                            <label for="pase_dosdias">Boletos deseados:</label>
                            <input type="number" class="form-control" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                            <input type="hidden" value="45" name="boletos[2dias][precio]">
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!--pauqtes-->
                </div>
                <!--form-group-->

                <div class="form-group">
                  <div class="box-header with-border">
                    <h3 class="box-title">Elije los talleres</h3>
                  </div>
                  <div id="eventos" class="eventos clearfix row">
                    <div class="caja">
                      <?php
                      try {
                        //require_once('includes/funciones/bd_conexion.php');
                        $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                        $sql .= " FROM eventos ";
                        $sql .= " JOIN categoria_evento ";
                        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                        $sql .= " JOIN invitados ";
                        $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                        $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";

                        //echo $sql;
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        echo $e->getMessage();
                      }


                      $eventos_dias = array();
                      while ($eventos = $resultado->fetch_assoc()) {
                        $fecha = $eventos['fecha_evento'];
                        setlocale(LC_ALL, "Spanish_Argentina");
                        //setlocale(LC_ALL, "es_ES");

                        $dia_semana = array("domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sabado");
                        $nombre_dia = $dia_semana[strftime("%w", strtotime($fecha))];

                        $categoria = $eventos['cat_evento'];

                        $dia = array(
                          'nombre_evento' => $eventos['nombre_evento'],
                          'hora' => $eventos['hora_evento'],
                          'id' => $eventos['evento_id'],
                          'nombre_invitado' => $eventos['nombre_invitado'],
                          'apellido_invitado' => $eventos['apellido_invitado']
                        );
                        $eventos_dias[$nombre_dia]['eventos'][$categoria][] = $dia;
                      }

                      //  echo "<pre>";
                      //  var_dump($eventos_dias);
                      //  echo "</pre>";
                      ?>

                      <?php foreach ($eventos_dias as $dia => $eventos) { ?>
                        <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix row">
                          <h4 class="text-center nombre-dia"><?php echo $dia; ?></h4>

                          <?php foreach ($eventos['eventos'] as $tipo => $evento_dia) : ?>
                            <div class="col-md-4"><!--ancho-->
                              <p><?php echo $tipo; ?></p>

                              <?php foreach ($evento_dia as $evento) { ?>
                                <label>
                                  <input type="checkbox"   name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
                                  <time><?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
                                  <br>
                                  <span class="autor"><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></span>
                                </label>
                              <?php }  //echo "<pre>";
                              //var_dump($evento_dia);
                              /*echo "</pre>"; */  ?>
                              <!--foreach-->

                            </div>
                          <?php endforeach;  ?>
                        </div>
                        <!--contenido dias-->
                      <?php }  ?>
                    </div>
                    <!--.caja-->
                  </div>
                  <!--#eventos-->
                </div>

                <div class="form-group">
                  <div id="resumen" class="resumen">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pagos y Extras</h3>
                    </div>
                    <br>
                    <div class="caja clearfix row">
                      <div class="extras col-md-6">
                        <div class="orden">
                          <label for="camisa_evento">Camisa del Evento $10 <small>{Promoción /% Dto}</small></label>

                          <input type="number" class="form-control" min="0" id="camisa_evento" name="pedido_camisas" size="3" placeholder="0">
                        </div>
                        <!--orden-->

                        <div class="orden">
                          <label for="etiqueta">Paquete de 10 etiquetas $2 <small>{HTML5, CSS3, JS, ReactJS}</small></label>

                          <input type="number" class="form-control" min="0" id="etiqueta" name="pedido_etiquetas" size="3" placeholder="0">
                        </div>
                        <!--orden-->

                        <div class="orden">
                          <label for="regalo">Seleccione un regalo</label>
                          <select id="regalo" name="regalo" required class="form-control select2">
                            <option value="">- Seleccione un regalo -</option>
                            <option value="2">Etiquetas</option>
                            <option value="1">Pulsera</option>
                            <option value="3">Pluma</option>

                          </select>
                        </div>
                        <!--Orden-->
                        <br>
                        
                  

                        <input type="button" id="calcular" class="btn btn-success" value="calcular">
                      </div>
                      <!--extras-->

                      <div class="total col-md-6">
                        <p>Resumen</p>

                        <div id="lista-productos">

                        </div>
                        <p>Total:</p>

                        <div id="suma-total">

                        </div>

                        <input type="hidden" name="total_pedido" id="total_pedido">
                        <input type="hidden" name="total_descuento" id="total_descuento"  value="total_descuento">
                      </div>
                      <!--total-->
                    </div>
                    <!--Caja-->
                  </div>
                  <!--Resumen-->
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
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